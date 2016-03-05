jQuery(document).ready(function() {
	options = { panzoomEnabled: false }

	viewer = new Viewer('#layer_list', '.layer_settings', true, options);
	viewer.addView('#view_axial', Viewer.AXIAL);
	viewer.addView('#view_coronal', Viewer.CORONAL);
	viewer.addView('#view_sagittal', Viewer.SAGITTAL);
	
	images = 
		{
			'url': 'data/MNI152.nii.gz',
			'name': 'MNI152 2mm',
			'colorPalette': 'grayscale',
			'cache': false,
			'intent': 'Intensity:'
		};
	
	viewer.loadImages(images);
});