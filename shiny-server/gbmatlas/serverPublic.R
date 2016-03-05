library(shiny)
library(survival)
require(DBI)
require(RMySQL)

# TO DO
# What is the max number of probes?
# Concerned that stats don't reflect filtering done by person
# what units is the time in?
# colors to match site
# What is the black line on expression plot?
#shinyapps::configureApp("gbmatlas", size="xxlarge")

# DATABASE -----------------------------------------------------------------
uname = "username"
pword = "password"
db.name = 'dbname'
host = "host"
connect.db <- function(username, password, db.name, host = host) {
  m <- dbDriver("MySQL")
  con <- dbConnect(m, username=username, password = password, dbname = db.name, host)
}


# DATA QUERY --------------------------------------------------------------
con = connect.db(uname, pword, db.name, host)
merged.probes = dbGetQuery(con,"SELECT * FROM probes") 
merged.clinical = dbGetQuery(con, "SELECT * FROM clinical;")
merged.clin = dbGetQuery(con, "SELECT * FROM clin;")
merged.stat = dbGetQuery(con, "SELECT * FROM stat;") 
dbDisconnect(con)

# DATA PREPARATION --------------------------------------------------------
rownames(merged.clinical) = merged.clinical$array_id
rownames(merged.clin) = merged.clin$array_id

probeName = merged.probes$gene_symbol
merged.clinical$csubtype[merged.clinical$csubtype == "MES"] = "Mesenchymal (MES)"
merged.clinical$csubtype[merged.clinical$csubtype == "PN"] = "Proneural (PN)"
merged.clinical$csubtype[merged.clinical$csubtype == "NL"] = "NL (Neural)"
merged.clinical$csubtype[merged.clinical$csubtype == "CL"] = "Classical (CL)"

# Define server logic required to summarize and view the selected dataset
shinyServer(function(input, output, session) {
  
  # ------- DYNAMICALLY RENDER USER INTERFACE -------------------------------------

  # Choose a probe based on the gene in the URL
  output$probeChoice <- renderUI({
      if (input$g %in% merged.probes$gene_symbol){
        probes = merged.probes$probe_set_id[which(merged.probes$gene_symbol == input$g)]
        radioButtons("probe", "Probe:", probes, selected = probes[1])
      }
    })

  # -- REACTIVE FUNCTIONS
  
  # Returns number of probes
  nprobes = reactive({
    length(merged.probes$probe_set_id[which(merged.probes$gene_symbol == input$g)])
  })
  
  # Returns probe ids 
  getids = reactive({
    merged.probes$probe_set_id[which(merged.probes$gene_symbol == input$g)]
  })
  
  # ------- SUBSET DATA FUNCTIONS
  
  # Return the requested gene - this is reactive, meaning that if "input$g" changes, so does the data
  # The output object is always returned by the server
  datasetInput <- reactive({

    # IS THE USER BEING SILLY?
    # AGE If none selected, change boxes to all
    if (input$typefilter == TRUE && length(input$gbmtype)==0) {
      updateCheckboxGroupInput(session, "gbmtype", choices = c("Proneural (PN)","Mesenchymal (MES)","NL (Neural)","Classical (CL)"), selected = c("Proneural (PN)","Mesenchymal (MES)","NL (Neural)","Classical (CL)"))
    }
    
    # GENDER If none selected, change boxes to all
    if (input$genderfilter == TRUE && length(input$gender)==0) {
      updateCheckboxGroupInput(session, "gender", choices = c("Male","Female"), selected = c("Male","Female"))
    }

    # RACE if none selected, change boxes to all
    if (input$racefilter == TRUE && length(input$race)==0) {
      updateCheckboxGroupInput(session, "race", choices = c("White","Black or African American","Asian"), selected = c("White","Black or African American","Asian"))
    }

    # ETHNICITY if none selected, change boxes to all
    if (input$ethnicityfilter == TRUE && length(input$ethnicity)==0) {
      updateCheckboxGroupInput(session, "ethnicity", choices = c("Hispanic or Latino","Not Hispanic or Latino"), selected = c("Hispanic or Latino","Not Hispanic or Latino"))
    }
    
    # If age slider range is <10, we don't want to reveal individuals
    if (input$demofilter == TRUE) {
      if (input$age[2] - input$age[1] < 10) {
        updateSliderInput(session, "age", value = c(10,90))
      }
    }

    # If karnofsky range is <10, we don't want to reveal individuals
    if (input$kfilter == TRUE) {
      if (input$kscore[2] - input$kscore[1] < 10) {
        updateSliderInput(session, "kscore", value = c(20,90))
      }
    }
    
    # Query for expression data and group levels data
    con = connect.db(uname, pword, db.name, host)
    
    tmpexp = dbGetQuery(con, paste("SELECT * FROM expression WHERE ProbeID = '",input$probe,"';",sep=""))
    tmpgrp = dbGetQuery(con, paste("SELECT * FROM level WHERE ProbeID = '",input$probe,"';",sep=""))      
      
    # Filter to only include those we have clinical data for
    idx = c(which(colnames(tmpexp) %in% rownames(merged.clin)))
    tmpexp = tmpexp[idx]
    tmpgrp = tmpgrp[idx]
    time = merged.clin$time[idx]
    status = merged.clin$status[idx]
    age = merged.clin$nage[idx]
    gender = merged.clin$gender[idx]
    race = merged.clin$race[idx]
    ethnicity = merged.clin$ethnicity[idx]
    kscore = as.numeric(merged.clin$karnofsky_score[idx])
    gbmtype = merged.clinical$csubtype[idx]    
   
    idx = c(which(colnames(tmpexp) %in% rownames(merged.clin)))
    tmpexp = tmpexp[which(gbmtype %in% input$gbmtype)]
    tmpgrp = tmpgrp[which(gbmtype %in% input$gbmtype)]
    age = age[which(gbmtype %in% input$gbmtype)]
    time = time[which(gbmtype %in% input$gbmtype)]
    status = status[which(gbmtype %in% input$gbmtype)]
      
    # If user wants to filter by age
    if (input$demofilter) {
      # Age selection - first get rid of empty values
      tmpexp = tmpexp[which(age!="")]
      tmpgrp = tmpgrp[which(age!="")]
      time = time[which(age!="")]
      status = status[which(age!="")]
      age = as.numeric(age[which(age!="")])
      idx <- which(age > input$age[1] & age < input$age[2]) 
      tmpexp = tmpexp[idx]
      tmpgrp = tmpgrp[idx]
      time = time[idx]
      status = status[idx]
      gender = gender[idx]
      race = race[idx]
      ethnicity = ethnicity[idx]
      kscore = kscore[idx]  
    }
    
    # If user wants to filter by gender
    if (input$genderfilter) {
      # Convert to all caps
      sex = toupper(input$gender)
      tmpexp = tmpexp[which(gender!="")]
      tmpgrp = tmpgrp[which(gender!="")]
      time = time[which(gender!="")]
      status = status[which(gender!="")]
      gender = gender[which(gender!="")]
      idx <- which(gender %in% sex) 
      tmpexp = tmpexp[idx]
      tmpgrp = tmpgrp[idx]
      time = time[idx]
      status = status[idx]
      race = race[idx]
      ethnicity = ethnicity[idx]
      kscore = kscore[idx]  
    }

    # If user wants to filter by ethnicity
    if (input$ethnicityfilter) {
      eth = toupper(input$ethnicity)
      tmpexp = tmpexp[which(ethnicity %in% c("HISPANIC OR LATINO","NOT HISPANIC OR LATINO"))]
      tmpgrp = tmpgrp[which(ethnicity %in% c("HISPANIC OR LATINO","NOT HISPANIC OR LATINO"))]
      time = time[which(ethnicity %in% c("HISPANIC OR LATINO","NOT HISPANIC OR LATINO"))]
      status = status[which(ethnicity %in% c("HISPANIC OR LATINO","NOT HISPANIC OR LATINO"))]
      ethnicity = ethnicity[which(ethnicity %in% c("HISPANIC OR LATINO","NOT HISPANIC OR LATINO"))]
      idx <- which(ethnicity %in% eth) 
      tmpexp = tmpexp[idx]
      tmpgrp = tmpgrp[idx]
      time = time[idx]
      status = status[idx]
      race = race[idx]
      kscore = kscore[idx]  
    }
    
    # If user wants to filter by karnofsky score
    if (input$kfilter) {
      tmpexp = tmpexp[which(!is.na(kscore))]
      tmpgrp = tmpgrp[which(!is.na(kscore))]
      time = time[which(!is.na(kscore))]
      status = status[which(!is.na(kscore))]
      kscore = kscore[which(!is.na(kscore))]
      idx <- which(kscore > input$kscore[1] & kscore < input$kscore[2]) 
      tmpexp = tmpexp[idx]
      tmpgrp = tmpgrp[idx]
      time = time[idx]
      status = status[idx]
      race = race[idx]
    }

    # If user wants to filter by race
    if (input$racefilter) {
      rce = toupper(input$race)
      # Gender selection - first get rid of empty values
      tmpexp = tmpexp[which(race %in% c("WHITE","BLACK OR AFRICAN AMERICAN","ASIAN"))]
      tmpgrp = tmpgrp[which(race %in% c("WHITE","BLACK OR AFRICAN AMERICAN","ASIAN"))]
      time = time[which(race %in% c("WHITE","BLACK OR AFRICAN AMERICAN","ASIAN"))]
      status = status[which(race %in% c("WHITE","BLACK OR AFRICAN AMERICAN","ASIAN"))]
      race = race[which(race %in% c("WHITE","BLACK OR AFRICAN AMERICAN","ASIAN"))]
      idx <- which(race %in% rce) 
      tmpexp = tmpexp[idx]
      tmpgrp = tmpgrp[idx]
      time = time[idx]
      status = status[idx]
    }
    
    
  # Remove those with nan/na
  tmpexp = tmpexp[!is.na(tmpexp) & !is.na(tmpgrp)]
  tmpgrp = tmpgrp[!is.na(tmpexp) & !is.na(tmpgrp)]
  
  dbDisconnect(con)
    
  list(status = status, 
       time = time,
       genedata = tmpexp,
       groups = tmpgrp,
       stat = merged.stat[which(merged.stat$AffyID == input$probe),],
       gene = input$g,
       probeID = input$probe)
})
  
  

  # ------- PLOTTING FUNCTIONS      
  output$plot <- renderPlot({

        while (input$probefilter == FALSE) { return(NULL) }
    
        if (!input$g %in% merged.probes$gene_symbol) { return(NULL) }
        else {
          raw = datasetInput()          
          if (input$plotChoice == "survival") {
            
            # Remove those that have empty value for time or status
            idx = which(raw$time!="" & raw$status!="" & !is.na(raw$status) & !is.na(raw$time))
            title = paste(raw$gene,"-",raw$probeID," Survival Curve",sep="")  
            data = data.frame(gene=as.numeric(raw$genedata[idx]),time=as.numeric(raw$time[idx]),status=as.numeric(raw$status[idx]),groups=as.numeric(raw$groups[idx]))
            model = coxph(Surv(time,status) ~ gene + strata(groups), data=data)
            plot(survfit(model),col=c(3,4,6),lwd=2,xlab="Time (units)",ylab="Percentage Alive",main=title)
            # Do we want 95% confidence intervals
            if (input$cintervals) {
              lines(survfit(model),conf.int=T,col=c(3,4,6),lty=2,lwd=1.5)
            }
            legend(x="topright",1,legend = c("Low","Medium","High"),lwd=2,col=c(3,4,6),bty="n")      
            
            # EXPRESSION  
          } else {
            # TO DO: What is the squiggle line?  
            idx = which(!is.na(raw$genedata))
            data = data.frame(gene=as.numeric(raw$genedata[idx]),groups=as.numeric(raw$groups[idx]))
            plot(sort(data$gene),col=c(1),lwd=3,xlab="Sorted Arrays",ylab=paste(raw$gene,"-",raw$probeID," Expression",sep=""),pch=".",ylim=c(min(data$gene),max(data$gene)))
            abline(raw$stat$mean,seq(0,length(raw$genedata[idx])),col=2,lty=2,lwd=2)
            abline(raw$stat$mean-raw$stat$sd,seq(0,length(raw$genedata)),col=4,lty=2,lwd=2)
            abline(raw$stat$mean+raw$stat$sd,seq(0,length(raw$genedata)),col=3,lty=2,lwd=2)
          }
        }      
      })
  
  # This renders the link to the brain image
  output$brainImages <- renderUI({
    
    if (input$probefilter == TRUE) { 
      
    if (input$g %in% merged.probes$gene_symbol) {
        raw <- datasetInput()
        HTML(paste('
               <form name="myform" action="http://gbmatlas.stanford.edu/brain.php" method="GET" target="_blank">
               <input type="hidden" id="gene" name="gene" value=',raw$gene, '>',
               '<input type="hidden" id="probe" name="probe" value="',raw$probeID, '">',
               '<input type="submit" value="View Brain Map" style="background-color: #f39c12"><br>
               </form>
               ',sep=''
        ))
      }
    }
  })

  # This produces text to display below plot
  output$summary <- renderText({

      if (input$probefilter == FALSE) { 
        textDisplay = c("Please select a gene probe in the panel to the left.")
      } else {
    
        if (input$g %in% merged.probes$gene_symbol) { 
        raw <- datasetInput()
        textDisplay = c("Gene:",input$g,"\n",
                      "Threshold",raw$stat$thr,"\n",
                      "High:",raw$stat$hi,"\n",
                      "Int:",raw$stat$int,"\n",
                      "Low:",raw$stat$lo,"\n",
                      "Total:",length(raw$genedata),"\n",
                      "Stdev",round(raw$stat$sd,3),"\n")
        } else {
          textDisplay = c("Gene",input$g,"is not in database!")
        }
      }
    })  

})
