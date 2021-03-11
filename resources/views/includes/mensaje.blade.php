@if (session("mensaje"))
{{-- data-auto-dismiss="5000" -> se borra el mensaje automáticamente en 5 segundos --}}
<div class="alert alert-success alert-dismissible" data-auto-dismiss="3000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i>Mensaje sistema Biblioteca</h4>
    <ul>
              <li>{{ session("mensaje") }}</li>
    </ul>
  </div>
@endif
