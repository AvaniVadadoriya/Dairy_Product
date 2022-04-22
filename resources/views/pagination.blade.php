<link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">


@if($paginator->hasPages())
    <div class="product__pagination">
        @if($paginator->onFirstPage())
            <a ><i class="typcn typcn-chevron-left menu-icon"></i></a>
        @else

            <a href="{{$paginator->previousPageUrl()}}"><i class="typcn typcn-chevron-left menu-icon"></i></a>

        @endif

       
        @if(is_array($elements[0]))
            @foreach($elements[0] as $page => $url)
                @if($page == $paginator->currentPage())
                    <a href="{{$url}}"  class="active">{{$page}}</a>
                @else
                <a href="{{$url}}" >{{$page}}</a>
                @endif
            @endforeach
        @endif

        @if($paginator->hasMorePages())
            <a href="{{$paginator->nextPageUrl()}}"><i class="typcn typcn-chevron-right menu-icon"></i></a>
        @else
            <a><i class="typcn typcn-chevron-right menu-icon"></i></a>

        @endif
      
    </div>
@endif
