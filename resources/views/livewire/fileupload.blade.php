<div>
    
    <!-- Success message -->
    @if($success == 1)
        <div class="alert alert-success">
            Upload successfully
        </div>
    @endif

    <!-- Upload form -->
    <form wire:submit.prevent="save">
        <input type="file" wire:model="file">

        @error('file')
            <div class="error text-danger">* {{ $message }}</div>
        @enderror

        <div class="mt-2">
            <button class="btn btn-info" type="submit">Upload</button>
        </div>
    </form>

    <!-- File preview -->
    <div class="mt-5">
        @if($success == 1)
            @if($isImage)
                <img src="{{ asset($filepath) }}" width="200px">
            @else
                <a href="{{ asset($filepath) }}">{{ $original_filename }}</a>
            @endif
        @endif
    </div>
</div>
