library(shiny)

# This function will get the gene from the page url
getGene <- function(inputId, selected = 20) {
  tagList(
    singleton(tags$head(tags$script(src = "js/getGene.js"))),
    tags$input(id = inputId,
               class = "g",
               value = selected),
    tags$style(type='text/css', "#g { display:none; }")
  )
}

# Define UI for dataset viewer application
shinyUI(pageWithSidebar(
  
  # Application title
  headerPanel(""),
  
  # Sidebar with controls to select a gene
  sidebarPanel(
    
    # Ask the user to select a gene
    #uiOutput("geneChoice"),
    
    # Get the gene from the url
    getGene(inputId="g"),
    
    # Does the user want to see expression or survival?
    selectInput("plotChoice","Plot Type:", choices = c("survival","expression"), selected = "survival"),
    
    checkboxInput("probefilter","Select Probe", FALSE),
    conditionalPanel(
      condition = "input.probefilter == true",
      uiOutput("probeChoice")
    ),

    checkboxInput("advancefilter","Advanced", FALSE),
    conditionalPanel(
      condition = "input.advancefilter == true",
      
      # Subtype choice
      checkboxInput("typefilter", "Subtype Filter", FALSE),
      conditionalPanel(
        condition = "input.typefilter == true",
        checkboxGroupInput("gbmtype", "Include:", c("Proneural (PN)","Mesenchymal (MES)","NL (Neural)","Classical (CL)"), selected =  c("Proneural (PN)","Mesenchymal (MES)","NL (Neural)","Classical (CL)"))
      ),
    
      # Confidence Intervals
      checkboxInput("cintervals", "Confidence Intervals", FALSE),
    
      # Filter based on age?
      checkboxInput("demofilter", "Age Filter", FALSE),
      conditionalPanel(
        condition = "input.demofilter == true",
        # Select age range
        sliderInput("age", "Age:",
                min = 1, max = 100, value = c(10,90))
      ),
      # Filter based on karnofsky score?
      checkboxInput("kfilter", "Karnofsky Score Filter", FALSE),
      conditionalPanel(
        condition = "input.kfilter == true",
        # Select kscore range
        sliderInput("kscore", "Karnofsky Score:",
                  min = 20, max = 100, value = c(20,90))
      ),
      # Flter based on gender?
      checkboxInput("genderfilter", "Gender Filter", FALSE),
      conditionalPanel(
        condition = "input.genderfilter == true",
        # Select gender range
        checkboxGroupInput("gender", "Include:", c("Male","Female"), selected =  c("Male","Female"))
      ),
      # Flter based on race?
      checkboxInput("racefilter", "Race Filter", FALSE),
      conditionalPanel(
        condition = "input.racefilter == true",
        checkboxGroupInput("race", "Include:", c("White","Black or African American","Asian"), selected =   c("White","Black or African American","Asian"))
      ),
      # Flter based on ethnicity?
      checkboxInput("ethnicityfilter", "Ethnicity Filter", FALSE),
      conditionalPanel(
        condition = "input.ethnicityfilter == true",
        checkboxGroupInput("ethnicity", "Include:", c("Hispanic or Latino","Not Hispanic or Latino"), selected =  c("Hispanic or Latino","Not Hispanic or Latino"))
      ))  
    ),
  
  # Show a summary of the model and an HTML table with the requested
  # number of observations
  mainPanel(
    plotOutput('plot'),
    verbatimTextOutput('summary'),
    # Link to brain images
    uiOutput("brainImages")
  )
))