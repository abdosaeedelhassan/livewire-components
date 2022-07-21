<div>
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
            data:@json($options)
        });
        $('#{{$componentId}}').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
        });
    });
</script>
@endpush