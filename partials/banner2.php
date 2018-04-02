
<style>
.fullscreen-bg {
  position: relative;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
  z-index: -100;
  height: 550px;
}
.fullscreen-bg div{
background-color:rgba(0,0,0,0.2);
width:100%;
height:100%;
position:absolute;
z-index:1;
}

.fullscreen-bg__video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;

}

@media (min-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
   /* height: 300%;*/
    top: -100%;
  }
}

@media (max-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
    width: 300%;
    left: -100%;
  }
}

@media (max-width: 767px) {
  .fullscreen-bg {
    background: url('../img/banner2.png') center center / cover no-repeat;
  }

  .fullscreen-bg__video {
    display: none;
  }

}
h1{
color:#fff;

}
</style>
<div class="fullscreen-bg d-none d-md-block text-center">
    <div>
        <h1 class="text-center text-light mt-5"><?php echo _("ELECTRIC BIKE ROUTE BY AVILA");?></h1>
    </div>
        <video loop muted autoplay poster="../img/banner2.png" class="fullscreen-bg__video">
            <source src="../img/videos/video2.mp4" type="video/mp4">
        </video>
</div>
