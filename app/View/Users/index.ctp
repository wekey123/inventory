<div ng-controller="homeController">
 <div class="container" >
<div class="row row-offcanvas row-offcanvas-right">
    	<div class="col-xs-12 col-sm-9">
 
         	<div class="jumbotron">
                 <h1>Hello, world!</h1>
                    <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
               
         </div>
         
        	<div class="row">
                  <div class="col-xs-6 col-lg-4" ng-repeat="repo in repos" style="border:1px solid #ccc; margin:5px;">
                      <h5>{{repo.Product.title}}</h5>
                      <p><img src="../../../img/product/small/{{repo.Product.ProductImage[0].img_src}}"></p>
                      <p>{{repo.Product.description | limitTo: 70}}</p>
                      <p><a class="btn btn-default" href ng:click="addItem(repo.Product.price,1,repo.Product.id,repo.Product.title)" role="button">Add to Cart &raquo;</a></p></div></div>
         </div>
         

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
      </div>
	</div>
    <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div>

</div>