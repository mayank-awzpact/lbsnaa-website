<!-- resources/views/user/pages/microsites/video_gallery.blade.php -->

@include('user.pages.microsites.includes.header')

<div style="margin: 20px 0;">
    <h2>Video Gallery</h2>
    <div class="video-gallery-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach ($videos as $video)
            <div class="video-card" style="width: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <div style="padding: 15px;">
                    <h3 style="margin: 0 0 10px; font-size: 18px; color: #333;">{{ $video->category_name }}</h3>
                    <h5 style="margin: 0 0 10px; font-size: 18px; color: #333;">{{ $video->video_title_en }}</h5>
                    <h6 style="margin: 0 0 10px; font-size: 18px; color: #333;">{{ $video->video_title_hi }}</h6>
                </div>

                <div style="padding: 10px;">
                    <video width="100%" controls>
                        <source src="{{ asset('storage/' . $video->video_upload) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('user.pages.microsites.includes.footer')
