$(document).ready(function() {
    var com_asprise_scan_app_license = "ENTwJt8xMa3wVWon6qFOS17y7OUgMEkJE0hGIz+W6my+wlWY8tHknOWGTPt6eKB8Roo8Y00/yFflhY4FLmzLzvZOLMDlPdPlHo1ekZP8d1ur+kPoYYxxtyzKJ8P1f7vSJnjl1GjhDTBkmSRa3W/Gf2Y4nrZ3V90DNJOxHd2wjzicZ3L5rcrIYcpbgRUw2yD+wdRWPpJl9eWfaKrN9zKXJvBli2GdRti5vwyi8lwKjjq5i1QSKBaLGOJgt9KGWpTJzRjY8kLD9BweJusluxGW0/8Z2sP6DLBlF0QE6APhLqSfxM=";
    
    function displayStatus(loading, mesg, clear) {
        if(loading) {
            $('#info').html((clear ? '' : $('#info').html()) + '<p><img src="vendor/sebumi/images/loading.gif" style="vertical-align: middle;" hspace="8"> ' + mesg + '</p>');
        } else {
            $('#info').html((clear ? '' : $('#info').html()) + mesg);
        }
    }
    
    /** Returns true if it is successfully or false if failed and reports error. */
    function checkIfSuccessfully(successful, mesg, response) {
        displayStatus(false, '', true);
        if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
            displayStatus(false, '<pre>' + "User cancelled." + '</pre>', true);
            return false;
        } else if(!successful) {
            displayStatus(false, '<pre>' + "Failed: " + mesg + "\n" + response + '</pre>', true);
            return false;
        }
        return true;
    }
    
    /** Callback function to retrieve scanned images. Returns number of images retrieved. */
    function handleImages(successful, mesg, response) {
        if(!checkIfSuccessfully(successful, mesg, response)) {
            return 0;
        }

        var scannedImages = scanner.getScannedImages(response, true, false);
        displayStatus(false, '<pre>' + "Scanned Successfully" + '</pre>', true);
        for(var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
            var img = scannedImages[i];
            displayStatus(false, "\n<pre>  " + img.toString() + "</pre>", false);
            appendImage(img, document.getElementById('images'));
        }
        return (scannedImages instanceof Array) ? scannedImages.length : 0;
    }
    
    /** Callback function to retrieve upload response */
    function handleUploadResponse(successful, mesg, response) {
        if(!checkIfSuccessfully(successful, mesg, response)) {
            return 0;
        }

        var uploadResponse = scanner.getUploadResponse(response);
        if(uploadResponse) {
            displayStatus(false, "<h2>Upload Response from the Server Side: </h2>" + uploadResponse, true);
        } else {
            displayStatus(false, '<pre>' + "Failed: " + mesg + "\n" + response + '</pre>', true);
        }
    }
    
    /** Displays general response to the page - for demo purpose only. */
    function universalHandlerForDemo(successful, mesg, response) {
        try {
            if (!checkIfSuccessfully(successful, mesg, response)) {
                return;
            }

            // Original images
            var imgCount = handleImages(successful, mesg, response);

            // Thumbnails
            var thumbs = scanner.getScannedImages(response, false, true);
            if (thumbs.length > 0) {
                displayStatus(false, '<pre>' + "Thumbnails acquired: " + thumbs.length + '</pre>', false);

                $("#info").append("<div id=\"thumbs\"></div>");

                for (var i = 0; i < thumbs.length; i++) {
                    var t = thumbs[i];
                    appendImage(t, document.getElementById('thumbs'), true);
                }
            }

            var saveResponse = scanner.getSaveResponse(response);
            if (saveResponse) {
                displayStatus(false, "<h2>File Save Result: </h2>" + saveResponse, false);
            }
            var uploadResponse = scanner.getUploadResponse(response);
            if (uploadResponse) {
                displayStatus(false, "<h2>Upload Response from the Server Side: </h2>" + uploadResponse, false);
            }
        } catch (e) {
            displayStatus(false, "<h2>Exception</h2><p>" +
                    (e == null ? e : e.toString().replace(/[\x26\x0A\<>'"]/g,function(r){return"&#"+r.charCodeAt(0)+";"}) )
                    + "</p>", false);
        }
    }
    
    /** To track all the images (thumbnails excluded) scanned so far. */
    /** @type ScannedImage[] */
    var imagesScanned = [];

    /**
     * Appends image to given dom node.
     * @param scannedImage ScannedImage
     * @param domParent
     */
    function appendImage(scannedImage, domParent, isThumbnail) {
        if(! scannedImage) {
            return;
        }
        scanner.logToConsole("Appending scanned image: " + scannedImage.toString());
        if(!isThumbnail) {
            imagesScanned.push(scannedImage);
        }
        if(scannedImage.mimeType == scanner.MIME_TYPE_BMP || scannedImage.mimeType == scanner.MIME_TYPE_GIF || scannedImage.mimeType == scanner.MIME_TYPE_JPEG || scannedImage.mimeType == scanner.MIME_TYPE_PNG) {
            var elementImg = scanner.createDomElementFromModel(
                    {
                        'name': 'img',
                        'attributes': {
                            'class': 'scanned zoom thumb thumb-img',
                            'src': scannedImage.src,
                            'height': '100'
                        }
                    }
            );
            domParent.appendChild(elementImg);
            // optional UI effect that allows the user to click the image to zoom.
            enableZoom();

        } else if(scannedImage.mimeType == scanner.MIME_TYPE_PDF) {
            var elementA = scanner.createDomElementFromModel({
                'name': 'a',
                'attributes': {
                    'href': 'javascript:previewPdf(' + (imagesScanned.length - 1) + ');',
                    'class': 'thumb thumb-pdf'
                }
            });
            domParent.appendChild(elementA);
        }
    }

    function submitForm1() {
        displayStatus(true, "Submitting in progress, please standby ...", true);
        if(! scanner.submitFormWithImages('form1', imagesScanned, function(xhr) {
            if(xhr.readyState == 4) { // 4: request finished and response is ready
                displayStatus(false, "<h2>Response from the server: </h2>" + xhr.responseText, true);
            }
        })) {
            displayStatus(false, "Form submission cancelled. Please scan an image first.", true);
        }
    }

    function clearScans() {
        if((imagesScanned instanceof Array) && imagesScanned.length > 0) {
            if(window.confirm("Are you sure that you want to clear scanned images?")) {
                imagesScanned = [];
                document.getElementById('images').innerHTML = '';
            }
        }
    }

    function getLang() {
        return $("#lang").val();
    }

    // Low level scanner access demos
    function selectASource() {
        displayStatus(true, 'Selecting a source ...', true);
        scanner.getSource(handleLowLevelApiResponse, "select", true, null, null, false, null, {
           "i18n": {
               "lang": getLang()
           }
        });
    }

    function listSources() {
        displayStatus(true, 'Lists all sources ...', true);
        scanner.listSources(handleLowLevelApiResponse, false, "all", false, false, null);
    }

    function getSourceCaps() {
        displayStatus(true, 'Gets source capabilities ...', true);
        scanner.getSource(handleLowLevelApiResponse, "select", false, "all", false, true, "CAP_FEEDERENABLED: false; ICAP_UNITS: TWUN_INCHES", {
            "i18n": {
                "lang": getLang()
            }
        });
    }

    function getSystemInfo() {
        displayStatus(true, 'Gets system info ...', true);
        scanner.callFunction(handleLowLevelApiResponse, "asprise_scan_system_info");
    }

    function handleLowLevelApiResponse(successful, mesg, result) {
        displayStatus(false, (successful ? "OK" : "ERROR") + '<pre>' + (mesg ? " - " + mesg : "") + "\n" + result + '</pre>', true);
    }

    $(function() {
        if(window.scanner.hasJava()) {
            displayStatus(false, "JRE: " + window.scanner.deployJava.getJREs(), false);
        } else {
            if(! window.scanner.isWindows()) {
                displayStatus(false, "<p class='warn'>Currently, only Windows is supported.</p>", false);
            }
        }
    });
    
    function enableZoom() {
        Zoomerang.config({
            maxWidth: window.innerWidth, // 400,
            maxHeight: window.innerHeight, // 400,
            bgColor: '#000',
            bgOpacity: .85,
            onClose: function(target) {
                target.style.transform = ''; // fixing origin missing bug
            }
        }).listen('.zoom');
    }
    
    $(document).on('click','.passportjpg-scan',function() {
        displayStatus(true, 'Scanning', true);
        clearScans();
        scanner.scan(handleImages,
            {  "output_settings" : [ {
                "type" : "return-base64",
                "format" : "jpg"
            } ], "i18n": { "lang": getLang() } }, true, false);
    });
});