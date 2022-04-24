<x-app-layout>
    <x-slot name="header">{{ $question->question }} Düzenle </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="question">Soru</label>
                    <textarea name="question" id="question" rows="4"
                        class="form-control">{{ $question->question }}</textarea>
                </div>
                <div class="form-group">
                    @if($question->image)
                    <a href="{{ asset($question->image) }}" target="_blank">
                        <img src="{{ asset($question->image) }}" class="img-responsive" style="width:200px;">
                    </a>
                    @endif
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer1">1.Cevap</label>
                            <textarea name="answer1" id="answer1" rows="2"
                                class="form-control">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer2">2.Cevap</label>
                            <textarea name="answer2" id="answer2" rows="2"
                                class="form-control">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer3">3.Cevap</label>
                            <textarea name="answer3" id="answer3" rows="2"
                                class="form-control">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer4">4.Cevap</label>
                            <textarea name="answer4" id="answer4" rows="2"
                                class="form-control">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Doğru Cevap:</label>
                    <select name="correct_answer" class="form-control">
                        <option @if ($question->correct_answer === 'answer1') selected
                            @endif value="answer1">1.Cevap</option>
                        <option @if ($question->correct_answer === 'answer2') selected
                            @endif value="answer2">2.Cevap</option>
                        <option @if ($question->correct_answer === 'answer3') selected
                            @endif value="answer3">3.Cevap</option>
                        <option @if ($question->correct_answer === 'answer4') selected
                            @endif value="answer4">4.Cevap</option>
                    </select>
                </div>

                <div class=" form-group">
                    <button class="btn btn-sm btn-success btn-block" type="submit">Soruyu güncelle</button>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>
