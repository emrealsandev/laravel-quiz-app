<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.update',$quiz->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" required value="{{$quiz -> title }}">
                </div>
                <div class="form-group">
                    <label for="description">Quiz Açıklama</label>
                    <textarea name="description" id="description" rows="4" class="form-control"> {{ $quiz -> description }} </textarea>
                </div>
                <div class="form-group">
                    <label>Yayın durumu:</label>
                    <select name="status" class="form-control">
                        <option @if($quiz ->questions_count < 4) disabled  @endif  @if($quiz->status === 'publish') selected @endif value="publish">
                        Aktif
                        </option>
                        <option @if($quiz->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if($quiz->status === 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="myCheck"@if($quiz -> finished_at) checked @endif onclick="tarihGoster()">
                    <label>Bitiş Tarihi Olacak mı?</label>
                </div>
                <div class="form-group"@if($quiz -> finished_at) style="display: block" @endif style="display: none;" id="tarih">
                    <label>Bitiş Tarihi:</label>
                    <input type="datetime-local" name="finished_at" class="form-control" id="finished_at" @if($quiz-> finished_at) value="{{date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-success btn-block" type="submit">Güncelle</button>
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
