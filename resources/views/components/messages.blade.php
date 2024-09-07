@if (session()->has('messages'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong class="fs-5">{{session('messages')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
