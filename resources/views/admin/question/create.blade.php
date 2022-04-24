<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} için yeni soru oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.store',$quiz->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="question">Soru</label>
                    <textarea name="question" id="question" rows="4"
                        class="form-control">{{ old('question') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer1">1.Cevap</label>
                            <textarea name="answer1" id="answer1" rows="2"
                                class="form-control">{{ old('answer1') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer2">2.Cevap</label>
                            <textarea name="answer2" id="answer2" rows="2"
                                class="form-control">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer3">3.Cevap</label>
                            <textarea name="answer3" id="answer3" rows="2"
                                class="form-control">{{ old('answer3') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer4">4.Cevap</label>
                            <textarea name="answer4" id="answer4" rows="2"
                                class="form-control">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Doğru Cevap:</label>
                        <select name="correct_answer" class="form-control">
                            <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1.Cevap</option>
                            <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2.Cevap</option>
                            <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3.Cevap</option>
                            <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4.Cevap</option>
                        </select>
                </div>
               
                <div class=" form-group">
                    <button class="btn btn-sm btn-success btn-block" type="submit">Oluştur</button>
                </div>
            </form> 
        </div>
    </div>
</x-app-layout>
