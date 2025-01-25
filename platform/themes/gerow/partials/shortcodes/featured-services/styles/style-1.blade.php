<style>
    .sectors-container {
        display: flex;
        flex-wrap: wrap;
        /* gap: 20px; */
    }

    .sector-item {
        flex: 1;
        height: 300px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        position: relative;
        overflow: hidden;
        transition: flex-grow 0.3s ease-in-out, transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .sector-item:hover {
        flex-grow: 2; /* Sadece genişleme etkisi */
        transform: scale(1); /* Büyütmeyi devre dışı bırakma */
    }

    /* Diğer öğeleri küçültme özelliğini kaldırdık */
    .sector-item:not(:hover) {
        flex-grow: 1;
    }

    .sector-overlay {
        position: absolute;
        bottom: 0;
        /* background: rgba(0, 0, 0, 0.6); */
        color: white;
        width: 100%;
        padding: 20px;
        text-align: center;
        transition: opacity 0.3s ease-in-out;
    }

    .sector-item:hover .sector-overlay {
        opacity: 1;
    }

    .sector-overlay h2 {
        margin: 0;
        font-size: 18px;
    }

    .sector-overlay p {
        margin: 10px 0 0;
        font-size: 14px;
    }
</style>


<section
    class="services-area-two services-bg-two"
    @if ($bgImage = $shortcode->background_image) data-background="{{ RvMedia::getImageUrl($bgImage) }}" @endif
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="section-title-two mb-60 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                    <div class="view-all-btn text-end mb-30">
                        <a
                            class="btn"
                            href="{{ $buttonUrl }}"
                        >{!! BaseHelper::clean($buttonLabel) !!}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="sectors-container">
            @foreach ($services as $service)
                <div class="sector-item" style="background-image: url('{{ RvMedia::getImageUrl($service->image) }}');">
                    <div class="sector-overlay">
                        <h2 style="color: black">{{ $service->name }}</h2>
                        {{-- @if ($description = $service->description)
                            <p>{!! BaseHelper::clean(Str::limit($description, 100)) !!}</p>
                        @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
