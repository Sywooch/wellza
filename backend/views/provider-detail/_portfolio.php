<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="portfolio-list">
    <?php
    if (!empty($portfolios)) {
        foreach ($portfolios as $portfolio) {
            if (!empty($portfolio['media_url'])) {
                ?>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 mediaBox portfolio-box">
                    <a id="portfolio-modal-<?= $portfolio['media_id']; ?>" data-target=".portfolio-modal-<?= $portfolio['media_id']; ?>" data-toggle="modal" href="javascript:void(0)">
            <?php
            if ($portfolio['media_type'] == 'Video') {
                ?>
                            <img src="<?= $portfolio['video_thumbnails'] ?>" alt="gallery-img" class="img-responsive">
                            <?php
                        }
                        if ($portfolio['media_type'] == 'Image') {
                            ?>
                            <img src="<?= $portfolio['image_thumbnail'] ?>" alt="gallery-img" class="img-responsive">
                            <?php
                        }
                        ?>

                    </a>
                </div>                                
            <?php
        }
    }
}
?>
</div>
    <?php
    if (!empty($portfolios)) {
        //echo $returndata[0]['media_id'];

        foreach ($portfolios as $portfolio) {
            if (!empty($portfolio['media_url'])) {
                ?>
            <div id="portfolio-modal-<?= $portfolio['media_id']; ?>" class="modal inner-modal fade portfolio-modal-<?= $portfolio['media_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                    </div>

                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">

            <?php
            if ($portfolio['media_type'] == 'Video') {
                ?>
                                    <video name= "media-video" class="showvideo" width="100%" height="100%" controls preload="auto" width="640" height="264" poster="<?= $portfolio['video_thumbnails'] ?>">
                                        <source src="<?= $portfolio['media_url'] ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                <?php
            }
            if ($portfolio['media_type'] == 'Image') {
                ?>
                                    <img src="<?= $portfolio['media_url'] ?>" alt="gallery-img" class="img-responsive">
                                    <?php
                                }
                                ?>                                       
                            </div>        
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->                   
            <?php
        }
    }
}
?>

