<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Quiz Açıklama</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="myCheck" @if (old('finished_at'))
                    checked @endif onclick="tarihGoster()">
                    <label>Bitiş Tarihi Olacak mı?</label>
                </div>
                <div class="form-group" @if (old('finished_at')) style="display: block"
                    @endif style="display: none;" id="tarih">
                    <label>Bitiş Tarihi:</label>
                    <input type="datetime-local" name="finished_at" class="form-control" id="finished_at"
                        value="{{ old('finished_at') }}"">
                </div>
                <div class=" form-group">
                    <button class="btn btn-sm btn-success btn-block" type="submit">Oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            function tarihGoster() {
                var checkbox = document.getElementById("myCheck");
                var tarih = document.getElementById("tarih");
                if (checkbox.checked == true) {
                    tarih.style.display = "block";
                } else {
                    tarih.style.display = "none";
                }
            }

        </script>
    </x-slot>
</x-app-layout>
