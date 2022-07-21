<div wire:ignore>
    <select name="{{$componentId}}" id="{{$componentId}}" class="{{$componentId}} form-control">
    </select>
</div>
@push('after-scripts')
<script>
    $(document).ready(function() {
        $('.{{$componentId}}').select2({
            placeholder: 'Select an option',
            disabled:false,
            multiple:false,
            // theme:"classic",
            dropdownAutoWidth : true,
            allowClear: true,
            data:@json($optionsList)
        });
        $('#{{$componentId}}').on('select2:select', function (e) {
            @set('selectedClientId',e.params.data.id);
        });
    });
</script>
@endpush