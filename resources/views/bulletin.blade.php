@extends('main')

@section('csss')
<style>
	.info-meta{
	    padding-top: 10px;
	    color:#9999;
	}

	.recent{
	    padding-top:20px;
	}
</style>
@endsection

@section('content')

	<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Buletin</h2>
          <ol>
            <li><a href="{{ route('root') }}">Beranda</a></li>
            <li>Buletin</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
      <div class="row">
        <div class="col-md-9">
              <div class="panel panel-default">
               <div class="panel-body">
                  <h3>Latih Balita Anda Dalam Merangsang Saraf Motorik</h3>
                    <div class="info-meta">
                        <ul class="list-inline">
                            <li> <i class="fas fa-clock"></i> Jan 5, 2022 &nbsp;&nbsp; <i class="fa fa-user"></i> Posted by Burhan Mafazi</li>
                        </ul>
                    </div>
                  <hr>
                  
                    <div class = "media">
                    	<div class="row">
	                    	<div class="col-md-4">
		                       <a class = "pull-left" href = "#">
		                          <img class = "media-object " src = "{{ asset('admin/assets/images/background/user-info.jpg') }}" width="100%" height="200px" >
		                       </a>
	                    	</div>

	                    	<div class="col-md-8">
		                       <div class="media-body">
		                          <p style="text-align: justify;">A simple shell for an h1 to appropriately space out and segment sections of content on a page. It can utilize the h1's default small element, as well as most other components (with additional styles).
		                          A simple shell for an h1 to appropriately space out and segment sections of content on a page.
		                          </p>

		                          <p style="text-align: justify;">It can utilize the h1's default small element, as well as most other components (with additional styles).
		                            A simple shell for an h1 to appropriately space out and segment sections of content on a page. It can utilize the h1's default small element, as well as most other components (with additional styles). A simple shell for an h1 to appropriately space out and segment sections of content on a page.
		                         </p>
		                       </div>

		                        <p style="text-align:right;">
		                            <a href="">
		                                <button class="btn btn-primary">Read More</button>
		                            </a>
		                        </p>
	                    	</div>
                    	</div>
                    </div>

                    <hr>

                    <h3>Tip dan Trik dalam memilih laptop untuk penyuka game</h3>
                    <div class="info-meta">
                        <ul class="list-inline">
                            <li><i class="fas fa-clock"></i> Jan 5, 2022 &nbsp;&nbsp; <i class="fa fa-user"></i> Posted by Burhan Mafazi</li>
                        </ul>
                    </div>

                  	<hr>
                  
                    <div class = "media">
                    	<div class="row">
	                    	<div class="col-md-4">
		                       <a class = "pull-left" href = "#">
		                          <img class = "media-object " src = "{{ asset('admin/assets/images/background/img5.jpg') }}" width="100%" height="200px" >
		                       </a>
	                    	</div>

	                    	<div class="col-md-8">
		                       <div class="media-body">
		                          <p style="text-align: justify;">A simple shell for an h1 to appropriately space out and segment sections of content on a page. It can utilize the h1's default small element, as well as most other components (with additional styles).
		                          A simple shell for an h1 to appropriately space out and segment sections of content on a page.
		                          </p>

		                          <p style="text-align: justify;">It can utilize the h1's default small element, as well as most other components (with additional styles).
		                            A simple shell for an h1 to appropriately space out and segment sections of content on a page. It can utilize the h1's default small element, as well as most other components (with additional styles). A simple shell for an h1 to appropriately space out and segment sections of content on a page.
		                         </p>
		                       </div>
		                       
		                        <p style="text-align:right;">
		                            <a href="">
		                                <button class="btn btn-primary">Read More</button>
		                            </a>
		                        </p>
	                    	</div>
                    	</div>
                    </div>
               </div>
            </div>
         </div>  
        <div class="col-md-3">
            <div class="panel panel-default">
               <div class="panel-heading"><h4 class="text-center">Berita Terkini</h4></div>
               <div class="panel-body">
                    <div class="recent">
                        <a href="#"><img class="img-responsive" src="{{ asset('admin/assets/images/background/socialbg.jpg') }}" alt="" width="200px" height="auto" /></a>                
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fas fa-clock"></i> Jan 5, 2022 </a></li>
                            </ul>
                        </div>
                        <h5>
                            <a href="">Pertandingan Basket NBA berlangsung sangat sengit</a>
                        </h5>
                    </div>
                    
                    <div class="recent">
                        <a href="#"><img class="img-responsive" src="{{ asset('admin/assets/images/background/socialbg.jpg') }}" alt="" width="200px" height="auto" /></a>                        
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fas fa-clock"></i> Jan 5, 2022</li>
                            </ul>
                        </div>
                        <h5 class="entry-title">
                            <a href="">Tip dan Trik dalam memilih laptop untuk penyuka game</a>
                        </h5>
                    </div><!--recent-->
                </div>
            </div>      
        </div>          
    </div> 
      </div>
    </section>
	</main>
@endsection