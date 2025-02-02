<section
    class="services-area-five inner-services-bg"
    @if ($bgImage = $shortcode->background_image) data-background="{{ RvMedia::getImageUrl($bgImage) }}" style="background-image: url({{ RvMedia::getImageUrl($bgImage) }});"
    @else
         style="background-color: {{ $shortcode->background_color }};" @endif
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="section-title-two text-center mb-50">
                    @if ($title = $shortcode->title)
                        <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean(nl2br($description)) !!}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col justify-content-center">
            @foreach ($services as $index => $service)
                <div class="w-full">
                    <a href="{{ $service->url }}">
                    <div class="services-item">
                        <div class="row flex-row services-content {{ $index % 2 === 0 ? '' : 'flex-row-reverse' }}">
                            <!-- Text Content -->
                            <div class="col flex-col">
                                <div class="content-top">
                                    @if ($iconImage = $service->getMetaData('icon_image', true))
                                        <div class="icon">
                                            {{ RvMedia::image($iconImage, $service->name) }}
                                        </div>
                                    @elseif ($icon = $service->getMetaData('icon', true))
                                        <div class="icon">
                                            <i class="{{ $icon }}"></i>
                                        </div>
                                    @endif
                                    <h2 class="title">{{ $service->name }}</h2>
                                </div>
                                <p class="truncate-2-custom mb-0">
                                    {!! BaseHelper::clean($service->description) !!}
                                </p>
                            </div>
        
                            <!-- Image Content -->
                            <div style="max-width: 300px" class="services-thumb services-list-style-1">
                                @if ($image = $service->image)
                                    {{ RvMedia::image($image, $service->name) }}
                                @endif
                                {{-- <a class="btn transparent-btn" href="{{ $service->url }}">
                                    {{ __('VIEW DETAILS') }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
</section>
