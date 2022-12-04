
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
     <link rel="stylesheet" href="style.css">
     <!-- Boxiocns CDN Link -->
     <link rel="styleshee"   type="text/css" href="{{url('css/main.css')}}"  />
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script rel="stylesheet" herf="{{asset('forntend/css/bootstrap5.css')}}"></script>
    <link rel="stylesheet" herf="{{url('forntend/css/main.css')}}">
    <script rel="stylesheet" herf="{{asset('forntend/css/jquery-3.6.0.min.js')}}"></script>
    <script rel="stylesheet" herf="{{asset('forntend/js/bootstrap5.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" >
    
    <style>
      input[type=radio] {
    width: 30px;
    height: 30px;
    
}

        </style>
</head>
<body>
    

    


<script>
    $(function()
    {
        var $sections=$('.section-form');
        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd=index >=$sections.length-1;
            $('.form-navagation .next').toggle(!atTheEnd);
            $('.form-navagation [type=submit]').toggle(!atTheEnd);

        }
        function curIndex(){
            return $sections.index($sections.fliter('.current'));}
            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex()-1);
            });
            $('.form-navigation .next').click(function(){
                $('.contact-form ').parsely().whenValidate({
                    group:'block-' + curIndex()

                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsely-group','block-'+index);
            });
            navigateTo(0);
        
    })
</script>
</body>
</html>