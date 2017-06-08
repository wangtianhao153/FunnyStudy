<style>
    body{
        margin-top: 0px;
    }
</style>
<link href="https://cdn.bootcss.com/video.js/5.9.0-0/video-js.min.css" rel="stylesheet">
<video oncontextmenu="return false;" id="my-player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="730" height="456" poster="" data-setup="{}">
    <source type='video/mp4' src="{{ $URL }}"/>
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="http://videojs.com/html5-video-support/" target="_blank">
            supports HTML5 video
        </a>
    </p>
</video>
<div class="play"></div>
<script src="https://cdn.bootcss.com/video.js/5.9.0-0/video.min.js"></script>