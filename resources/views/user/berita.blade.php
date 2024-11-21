@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/Tugu-Jogja.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
        .form-control:focus {
          box-shadow: none;
        }

        .form-control::placeholder {
          font-size: 0.95rem;
          color: #aaa;
          font-style: italic;
        }
        .article{
          line-height: 1.6;
          font-size: 15px;
        } 
        body, #about {
    background: 
        linear-gradient(
            to right, 
            rgba(240, 240, 240, 0) 0%, 
            rgba(240, 240, 240, 0.8) 25%, 
            rgba(240, 240, 240, 0.8) 75%, 
            rgba(240, 240, 240, 0) 100%
        ),
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d3d3d3'%3E%3Cpath d='M30 30c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10-10-4.477-10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    background-attachment: fixed;
}

#about {
    background-color: transparent;
}
    </style>    
@endsection

{{-- @section('hero')
    <h1>berita Jogja-Travel</h1>
    <h2>Kumpulan artikel-artikel wisata Jogja, Tips travelling, dan kesehatan</h2>
@endsection --}}

@section('hero')
    @if($beritaSliders->isNotEmpty())
        @foreach($beritaSliders as $slider)
            <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
                <div class="hero-container">
                    <h1>Berita</h1>
                </div>
            </section>
        @endforeach
    @else
        <section id="hero">
            <div class="hero-container">
              <h1>Berita</h1>
            </div>
        </section>
    @endif
@endsection


@section('content')  
      <!--========================== Article Section ============================-->
      <section id="about">
        <div class="container wow fadeIn">

          <div class="row">
            <div class="col-9">
              
              @if (empty(request()->segment(2)) )
                @component('user.component.all_berita', ['articles'=> $articles])
                @endcomponent
              @else
                @component('user.component.single_berita', ['article'=> $article])
                @endcomponent
              @endif


            </div>
            <div class="col-3">
                <form action="{{route('blog_berita')}}" class="mt-5">
                  <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                    <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Apa yang ingin anda cari?" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                    <div class="input-group-append border-0">
                      <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
                <div class="mb-3 font-weight-bold">Recent Posts</div>
                @foreach ($recents as $recent)
                  <div>
                      <a href="{{route('blog_berita.show', [$recent->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                        {{$recent->judul}}
                      </a>
                      <hr >
                  </div>
                @endforeach
            </div>
          </div>

        </div>
      </section><!-- #services -->
  
     
@endsection