 <!-- Sidebar -->
<div id="sidebar-wrapper">
  <ul class="sidebar-nav">

    <br><br>

    @foreach($categories as $category)
      <li>
        <a href="{{route('category_product', $category->id)}}">
          {{ $category->name }}
        </a>
      </li>
    @endforeach

    <br><br>

  </ul>

</div>  <!-- close sidebar-wrapper -->