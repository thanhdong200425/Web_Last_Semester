<style>
    .music-player {
        background-color: #120000;
        color: #fff;
        padding: 10px;
        max-height: 150px;
    }

    .font-bigger {
        font-size: 1.3rem;
    }

    .hide {
        display: none;
    }

    .unhide {
        display: inline;
    }
</style>

<div class="music-player fixed-bottom" id="music_player">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('/uploads/alu.jpg') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-8">
                        <h5 class="text-white my-2">Title</h5>
                        <p class="fs-5">Description</p>
                    </div>
                </div>
            </div>
            <div class="col-6 text-center py-3">
                <button class="btn btn-outline-dark border border-0">
                    <i class="bi bi-shuffle text-white font-bigger"></i>
                </button>
                <button class="btn btn-outline-dark border border-0">
                    <i class="bi bi-skip-backward-circle text-white font-bigger"></i>
                </button>
                <button class="btn btn-outline-dark border border-0">
                    <i class="bi bi-play-circle-fill text-white font-bigger" id="play-button" data-path=""></i>
                    <i class="bi bi-pause-circle-fill text-white font-bigger hide" id="pause-button"></i>
                </button>
                <button class="btn btn-outline-dark border border-0">
                    <i class="bi bi-skip-forward-circle text-white font-bigger"></i>
                </button>
                <button class="btn btn-outline-dark border border-0">
                    <i class="bi bi-arrow-repeat text-white font-bigger"></i>
                </button>
                <audio src="" id="song"></audio>
            </div>
            <div class="col-3">
                <h1>Hello Wolrd</h1>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle event when user click on
    var audio;
    $('#play-button').on('click', function() {
        var path = $(this).data('path');
        var baseUrl = "{{ asset('/uploads/songs') }}";
        console.log(baseUrl + "/" + path);
        audio = new Audio(baseUrl + "/" + path);
        $(this).toggle();
        $('#pause-button').toggle();
        audio.play();
    });

    $('#pause-button').on('click', function() {
        $(this).toggle();
        $('#play-button').toggle();
        audio.pause();
    });
</script>
