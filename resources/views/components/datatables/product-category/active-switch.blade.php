<div class="form-check form-switch fs-6">
    <form method="post" action="{{ route('admin.product.product-category.change-active-status', $id) }}"
        class="changeStatusForm">
        @csrf
        @method('PUT')
        <input class="form-check-input me-0 product-category-active-switch" type="checkbox" id="toggle-dark" name="status"
            value="{{ $is_active ? 0 : 1; }}" style="cursor: pointer"
            @if ($is_active == '1') checked @endif>
        {{-- <input type="hidden" name="status" value="0"> --}}
        <label class="form-check-label" for="toggle-dark"></label>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $('.changeStatusForm').on('change', '.product-category-active-switch', function() {
            var $form = $(this).closest('form');
            $form.submit(); // Submit the closest form
        });
    });
</script>
