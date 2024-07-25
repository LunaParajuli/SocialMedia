<x-app-layout>
    <x-slot name="header">
        <strong>
            Create Comment
        </strong>
    </x-slot>

    <div class="container" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
        <div class="form-container"
            style="border: 1px solid #ccc; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; max-width: 500px;">
            <h1 style="text-align: center;"><strong>Edit Comment </strong></h1>
            </br>

            <div>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf


                    <div>
                        <label for="comment">Comment:</label>
                        <textarea id="comment" name="comment" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    </br>
                    <button type="submit">Edit</button>
                </form>
            </div>


        </div>
    </div>


</x-app-layout>
