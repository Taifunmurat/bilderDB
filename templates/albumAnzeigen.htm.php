<form name="albumAnzeigen" id="albumAnzeigen" action="<?php echo getValue('phpmodule'); ?>" method="post">
    <h2>Album anzeigen</h2>

    <div class="form-group">
        <label for="albumName" class="col-sm-2 control-label">Albumname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="albumName" name="albumName" placeholder="Albumname" required>
        </div>
        <label for="albumTag" class="col-sm-2 control-label">Albumtags</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="albumTag" name="albumTag" placeholder="Tags" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Anzeigen</button>
        </div>
    </div>
    <br><br>

</form>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="links">
    <a href="../bilder/PICT0003.jpg" title="Banana" data-gallery>
        <img src="../bilder/thumbnails/PICT0003.jpg" alt="Banana">
    </a>
    <a href="../bilder/PICT0013.jpg" title="Apple" data-gallery>
        <img src="../bilder/thumbnails/PICT0013.jpg" alt="Apple">
    </a>
    <a href="../bilder/BrÃ¶nnimann_Familienwappen.jpg" title="Orange" data-gallery>
        <img src="../bilder/thumbnails/BrÃ¶nnimann_Familienwappen.jpg" alt="Orange">
    </a>
</div>
