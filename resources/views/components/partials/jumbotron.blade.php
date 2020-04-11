
<div class="container">
    <div class="row">
        <div id="demo" class="carousel slide mb-5" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                @php($i = 0)
                @foreach($sliders as $slider)
                @php($active = '')
                    @if($i == 0)
                        @php($active = 'active')
                    @endif

                <li data-target="#demo" data-slide-to="{{ $i }}" class="{{ $active }}"></li>
                    @php($i++)
                @endforeach
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                @php($i = 0)
                @foreach($sliders as $slider)
                    @php($active = '')
                    @if($i == 0)
                        @php($active = 'active')
                    @endif
                <div class="carousel-item {{ $active }}">
                    <img src="{{ asset('uploads/images/sliders/' . $slider->image) }}" alt="Los Angeles">
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h5>{{ $slider->title }}</h5>--}}
                        {{--<p>{{ $slider->desc }}</p>--}}
                    {{--</div>--}}
                    <div class="col-md-8 mb-5 carousel-caption d-none d-md-block">
                        <h1 style="color: rebeccapurple; font-weight: bold" class="display-4 font-italic">{{ $slider->title }}</h1>
                        <p  style="color: rebeccapurple; font-weight: bold" class="lead my-3">{{ $slider->desc }}</p>
                        <p class="lead mb-0"><a target="_blank" href="{{ $slider->link }}" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                </div>
                    @php($i++)
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
</div>

