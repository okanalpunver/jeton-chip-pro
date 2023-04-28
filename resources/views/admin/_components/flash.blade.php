@php
$flash = array_merge([
    'title' => 'Title!',
    'text' => "Text",
    'type' => 'success',
    'showConfirmButton' => false,
    'timer' => 1500,
], session('flash'));
@endphp

<script>
    $(function () {
        swalBs.fire(@json($flash))
    });
</script>