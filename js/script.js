// JavaScript source code
var kavaliApp = angular.module('kavaliApp', ['ngRoute']).run(function ($rootScope, $location) {
    $rootScope.location = $location;
});
kavaliApp.config(function ($routeProvider) {

    $routeProvider
        .when('/', { templateUrl: 'home.html' })
        .when('/kavali', { templateUrl: 'kavali.html' })
        .when('/Guide', { templateUrl: 'LocalGuide/Guide.html', controller: 'guideController' })
        .when('/news', { templateUrl: 'news.php', controller:'newsController' })
        .when('/places', { templateUrl: 'places.html', controller: 'placesController' })
        .when('/media', { templateUrl: 'kavali/media.html' })
        .when('/advertise', { templateUrl: 'advertise.html', controller: 'advertiseController' })
        .when('/admin', { templateUrl: 'admin.html' })
		.when('/maps', { templateUrl: 'kavali/maps.html' })
		.when('/events', { templateUrl: 'kavali/events.html' })
		.when('/development-activities', { templateUrl: 'kavali/development.html' })
		.when('/kavali-calendar', { templateUrl: 'kavali/calendar.html' })
		.when('/phone-numbers', { templateUrl: 'phone-numbers.html' })
		.when('/govt-ofiices', { templateUrl: 'kavali/under-construction.html' })
		.when('/water-sources', { templateUrl: 'kavali/water-sources.html' })
		.when('/ward-members', { templateUrl: 'kavali/ward-members.html' })
		.when('/street-names', { templateUrl: 'kavali/street-names.html' })
		.when('/vip', { templateUrl: 'kavali/vips.html' })
		.when('/media', { templateUrl: 'kavali/media.html' })
		.when('/industries', { templateUrl: 'kavali/industries.html' })
		.when('/old-names', { templateUrl: 'kavali/oldnames.html' })
		.when('/kavali-revenue', { templateUrl: 'kavali/kavali-revenue.html' })
		.when('/kavali-assembly', { templateUrl: 'kavali/assembly.html' })
		.when('/nearplaces', { templateUrl: 'kavali/distance-from-kavali.html' })
		.when('/kavali-videos', { templateUrl: 'kavali/kavali-videos.html' })
		.when('/kavali-pics', { templateUrl: 'kavali/under-construction.html' })
        .when('/realestate', { templateUrl: 'Real/realestate.html', controller: 'realController' })
        .when('/notifications', { templateUrl: 'notifications.html' })
        .when('/documents', { templateUrl: 'documents.html', controller: 'documentController' })
        .when('/trends', { templateUrl: 'trends.html', controller: 'trendController' })
        .when('/kitchen', { templateUrl: 'kitchen.html', controller: 'kitchenController' })
        .when('/post', { templateUrl: 'post.php' })
		.when('/login', { templateUrl: 'login.html' })
        .otherwise({ redirectTo: '/' });

});

kavaliApp.controller('indexController', function ($scope) {
    // create a message to display in our view
    $scope.GetTitle = function (title) {
        $scope.realTitle = title;
    };
});
kavaliApp.controller('newsController', function ($scope, $location) {
	var newsId = $location.search().NewsId;
	if(newsId == undefined)
		newsId=$('.divide').first().attr('id');
	$.ajax({
			url:'cgi-bin/ReadNews.php',
			data:'newsId='+ newsId,
			dataType:"json",
			success: function(result)
			{
				//alert(result);
				$('#news').html(result);
			}
		});
	$scope.GetNews = function(newsId) {
		$.ajax({
			url:'cgi-bin/ReadNews.php',
			data:'newsId="'+newsId+'"',
			dataType:"json",
			success: function(result)
			{
				//alert(result);
				$('#news').html(result);
			}
		});
	};
});
kavaliApp.controller('guideController', function ($scope, $location) {
    // create a message to display in our view
    $scope.view = "LocalGuide/schools.html";
    $scope.LoadGuide = function (page) {
        //$scope.message = page;
		if(page != null || page !="")
			$scope.view = "LocalGuide/" + page + ".html";
		else
			$scope.view = "kavali/under-construction.html";
    };
    $scope.$on('$viewContentLoaded', function () {
        //Here your view content is fully loaded !!
        var url = $location.url().split('?')[1];
        if (url != undefined && url != "")
            $scope.view = "LocalGuide/" + url + ".html";
        else
            $scope.view = "LocalGuide/schools.html";
    });
});
kavaliApp.controller('realController', function ($scope, $location) {
    $scope.view1 = "Real/home.html";
    $scope.LoadReal = function (page) {
        $scope.view1 = "Real/" + page + ".html";
    };
    $scope.$on('$viewContentLoaded', function () {
        //Here your view content is fully loaded !!
        var url = $location.url().split('?')[1];
        if (url != undefined && url != "")
            $scope.view1 = "Real/" + url + ".html";
        else
            $scope.view1 = "Real/home.html";
    });
    $scope.GetTitle = function (title, req) {
        $scope.realTitle = title;
		$scope.propType = title;
		//$scope.requirement = req;
    };
	$scope.Search = function(){
		var listedFor = $("#selListefFor").val();
		var areaFrom = $("#selAreaFrom").val();
		var areaTo = $("#selAreaTo").val();
		var priceFrom = $("#selPriceFrom").val();
		var priceTo = $("#selPriceTo").val();
		var locality = $("#selLocality").val();
		var propertyType = $("#hdnPropertyType").val();
		var broker = $("#chkBroker").prop('checked');
		$.ajax({
			url:"cgi-bin/buy-rent.php",
			type:"POST",
			dataType:"json",
			data:{'listedFor':listedFor, 'areaFrom':areaFrom, 'areaTo':areaTo, 'priceFrom':priceFrom, 'priceTo':priceTo, 'locality':locality, 'propertyType':propertyType,'broker':broker},
			success: function(data){$("#props").html(data);},
			error: function(){alert('Error');}
		});
		return false;
	}
	$scope.Post = function(){
		var title = $("#txtTitle").val();
		var postedBy = $("input[name=postedBy]:checked").val();
		var listedFor = $("#selListedFor").val();
		var area = $("#txtArea").val();
		var price = $("#txtPrice").val();
		var locality = $("#selLocality").val();
		var propertyType = $("#hdnPropertyType").val();
		var propertyAge = $("#txtPropertyAge").val();
		var description = $("#txtDescription").val();
		var name = $("#txtName").val();
		var contact = $("#txtContact").val();
		
		$.ajax({
			url:"cgi-bin/sale-tolet.php",
			type:"POST",
			data:{'title':title, 'postedBy':postedBy, 'listedFor':listedFor, 'area':area, 'price':price, 'propertyAge':propertyAge, 'locality':locality,'description':description,'propertyType':propertyType, 'name':name, 'contact':contact},
			success: function(data){$('#myForm').trigger('reset'); alert(data);},
			error: function(){alert(data);}
		});
		return false;
	}
	$scope.SaleorBuy =['Buy','Sale','Rent','Lease'];
});
kavaliApp.controller('trendController', function ($scope, $location) {
    // create a message to display in our view
    $scope.view = "Trends/leggings.html";
    $scope.LoadPage = function (page) {
        $scope.view = "Trends/" + page + ".html";
    };
    $scope.$on('$viewContentLoaded', function () {
        //Here your view content is fully loaded !!
        var url = $location.url().split('?')[1];
        if (url != undefined && url != "")
            $scope.view = "Trends/" + url + ".html";
        else
            $scope.view = "Trends/leggings.html";
    });
});
kavaliApp.controller('documentController', function ($scope, $location) {
    $("#objDoc").css('height', $(window).height());
    $scope.LoadDocument = function (target) {
        //alert(target);
        var page = 'Documents';
        var appType = "application/pdf";
        if (target == undefined && target == "") {
            target = "Birth.pdf";
        }
        var url = "<object type='" + appType + "' data='" + page + '/' + target + "' style='width:100%;height:100%;'></object>";
        //var url="<b>hello</b>";
        $("#objDoc").html(url);
        return true;
    };
    $scope.$on('$viewContentLoaded', function () {
        var url = $location.url().split('?')[1];
        if (url != undefined && url != "")
            $scope.LoadDocument(url);
        else
            $scope.LoadDocument('Birth.pdf');
    });
});
kavaliApp.controller('kitchenController', function ($scope, $location) {
    // create a message to display in our view
    $scope.view = "kitchen.html";
    $scope.LoadPage = function (page) {
        //$scope.message = page;
        $scope.view = "Recipes/" + page + ".html";
    };
    $scope.$on('$viewContentLoaded', function () {
        //Here your view content is fully loaded !!
        var url = $location.url().split('?')[1];
        if (url != undefined && url != "")
            $scope.view = "Recipes/" + url + ".html";
        else
            $scope.view = "Recipes/Bonda.html";
    });
});
kavaliApp.controller('advertiseController', function ($scope) {
    $scope.calculate = function () {		
        var page = $("#selPage");
        var size = $("#selSize");
        var type = $("#selType");
        var graphic = $("#selGraphic");
        var errorMsg = "";
        if (page != undefined && (page == "" || page.val() == "Select")) {
            errorMsg += "<li>Please Select Page Name.</li>";
        }
        if (size != undefined && (size == "" || size.val() == "Select")) {
            errorMsg += "<li>Please Select Adv. size.</li>";
        }
        if (type != undefined && (type == "" || type.val() == "Select")) {
            errorMsg += "<li>Please Select Adv. type.</li>";
        }
        if (graphic != undefined && (graphic == "" || graphic.val() == "Select")) {
            errorMsg += "<li>Please Select graphic type.</li>";
        }
        if (errorMsg != "") {
            $("#divEdits").html(errorMsg);
            $("#divEdits").show();
        }
        else {
            errorMsg = "";
            $("#tblPrices").show();
            $scope.CalculatePrice(page, size, graphic, type);
            $("#divEdits").hide();
        }
    };

    $scope.CalculatePrice = function (page, size, graphic, type) {
        var output = "";
        var price = 0;
        price = (parseInt(page.val()) + parseInt(size.val()) + parseInt(graphic.val()) + parseInt(type.val())) * 100;
        $("#priceQuote").html("You need to pay <span>"+price+"</span> rupees for an year.");
        $("#priceQuote").show();
    };
});
kavaliApp.controller('placesController', function ($scope) {
    // create a message to display in our view
    var current = 0;
    var prevTarget;
    $scope.LoadImage = function (obj, target) {
        //alert(target);
        if (prevTarget != target)
            current = 0;
        var pages = $("#" + target + " li");
        var currentPage, nextPage;
        //alert(pages.length);
        currentPage = pages.eq(current);
        if ($(obj).hasClass("prevButton")) {
            if (current <= 0)
                current = pages.length - 1;
            else
                current = current - 1;
        }
        else {
            if (current >= pages.length - 1)
                current = 0;
            else
                current = current + 1;
        }
        nextPage = pages.eq(current);
        //alert(currentPage.html() + '::' + nextPage.html());
        currentPage.hide();
        nextPage.show();
        prevTarget = target;
    };
});