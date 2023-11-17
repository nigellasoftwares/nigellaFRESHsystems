$(document).ready(function() {
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
});