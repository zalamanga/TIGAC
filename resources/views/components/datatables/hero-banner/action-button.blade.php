<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Action
    </button>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <form action="{{ route('admin.hero-banners.destroy', $id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="dropdown-item text-danger" type="submit">Delete</button>
        </form>
        <a class="dropdown-item" href="#">Edit</a>
    </div>
</div>
