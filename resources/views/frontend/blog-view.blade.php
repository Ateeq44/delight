 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->

 <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.css" rel="stylesheet">

 <!-- Add custom CSS here -->
 <link href="css/blog-post.css" rel="stylesheet">
 <link href="css/youtube.css" rel="stylesheet">
 <link href="css/books.css" rel="stylesheet">

 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <style>
    p a{
        color: #57b846;
    }
 </style>



 @extends('layouts.front')

 @section('title')
 Blog
 @endsection

 @section('content')

 <div class="container">

 	<div class="row">
 		<div class="col-lg-8">

 			<!-- the actual blog post: title/author/date/content -->
 			<h1 style="margin-top: 70px;"><a href="">{{$blog->name}}</a></h1>
 			<p class=""><i class="fa fa-user"></i> by <a href="">{{ $blog->user_id}}</a>
 			</p>
 			<hr>
 			<p><i class="fa fa-calendar"></i> Posted on {{date_format($blog->created_at, "d-m-Y")}}</p>

 			<hr>
 			<img src="{{asset('upload/blog/'.$blog->image)}}" class="img-responsive">
 			<hr>
 			<p class="">{{$blog->blog}}</p>
 			<br/>


 			<hr>

 			<!-- the comment box -->
 			<div class="well">
 				<h4><i class="fa fa-paper-plane-o mb-4"></i> Leave a Comment:</h4>
 				<form role="form" action="{{url('blog-review')}}" method="POST">
 					@csrf
 					<div class="form-group">
 						<textarea class="form-control" style="font-size: 15px;" name="review" rows="3"></textarea>
 					</div>
 					<input type="hidden"  name="blog_id" value="{{$blog->id}}">
 					<button type="submit" class="btn btn-lg bg-color text-white">review</button>
 				</form>
 			</div>
 			<script src="https://apis.google.com/js/plusone.js">
 			</script>
 			<hr>
            @foreach ($review as $item)

 			<!-- the comments -->
 			<h3> {{$item->user->name}}
 				<small>{{date_format($item->created_at, 'd-m-Y')}}</small>
 			</h3>
 			<p>{{$item->review}}</p>
             @endforeach
 		</div>

 		<div class="col-lg-4">
 			<div class="well">
 				<h4><i class="fa fa-search"></i> Blog Search...</h4>
 				<div class="input-group">
 					<input type="text" style="margin-top: 20px;" class="form-control">
 					<span class="input-group-btn">
 						<button class="btn btn-default" style="margin-top: 20px;" type="button">
 							<i class="fa fa-search"></i>
 						</button>
 					</span>
 				</div>
 				<!-- /input-group -->
 			</div>
 			<!-- /well -->

 			<!-- /well -->
 			<div class="well">
 				<h4><i class="fa fa-thumbs-o-up"></i> Follow me!</h4>
 				<ul style="margin-top: 20px;">
 					<p><a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> <a title="Google+" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a> <a title="Linkedin" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a> <a title="GitHub" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-github fa-stack-1x"></i></span></a> <a title="Bitbucket" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-bitbucket fa-stack-1x"></i></span></a></p>
 				</ul>
 			</div>
 			<!-- /well -->
 			<!-- /well -->
 			<div class="well">
 				<h4><i class="fa fa-fire"></i> Category</h4>
 				<ul>
 					<li style="list-style-type: disclosure-closed; margin: 5px 16px;"><a href="">WPF vs. Windows Forms-Which is better?</a></li>
 				</ul>
 			</div>
 			<!-- /well -->

 			<!-- /well -->
 			<div class="well">
 				<h4><i class="fa fa-book"></i> Featured Posts:</h4>
 				<div class="row">

 					<div class="col-lg-12">
 						<div class="cuadro_intro_hover " style="background-color:#cccccc;">
 							<p style="text-align:center; margin-top:20px;">
 								<img src="http://placehold.it/500x330" class="img-responsive" alt="">
 							</p>
 							<div class="caption">
 								<div class="blur"></div>
 								<div class="caption-text">
 									<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Book 1</h3>
 									<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
 									<a class=" btn btn-default" href="#"><i class="fa fa-plus"></i> INFO</span></a>

 								</div>
 							</div>
 						</div>

 					</div>

 					<div class="col-lg-12">
 						<div class="cuadro_intro_hover " style="background-color:#cccccc;">
 							<p style="text-align:center; margin-top:20px;">
 								<img src="http://placehold.it/500x330" class="img-responsive" alt="">
 							</p>
 							<div class="caption">
 								<div class="blur"></div>
 								<div class="caption-text">
 									<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Book 2</h3>
 									<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
 									<a class=" btn btn-default" href="#"><i class="fa fa-plus"></i> INFO</span></a>

 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<hr>
 </div>
 @include('layouts.inc.footer')
 @endsection

