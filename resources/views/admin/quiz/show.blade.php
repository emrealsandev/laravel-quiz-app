<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('quizzes.index'), $quiz->id }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"> Quizlere Dön </i></a>
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son katılım tarihi
                                <span title="{{ $quiz->finished_at }}"
                                    class="badge badge-secondary badge-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge badge-secondary badge-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı
                                <span class="badge badge-secondary badge-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Puan
                                <span class="badge badge-secondary badge-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>
                    @if(count($quiz->topTen)>0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">ilk 10</h5>
                            <ul class="list-group">
                                @foreach ($quiz->topTen as $tten)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="h5">{{ $loop->iteration }}.</strong>
                                        <img src="{{ $tten->user->profile_photo_url }}" class="w-8 h-8 rounded-full">
                                        <span @if(auth()->user()->id == $tten->user_id) class="text-danger" @endif >
                                        {{ $tten->user->name }}
                                        </span>
                                        <span class="badge badge-success badge-pill">{{ $tten->point }}</span>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                    <table class="table table-bordered mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Puan</th>
                            <th scope="col">Doğru</th>
                            <th scope="col">Yanlış</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz->results as $result)
                          <tr>
                            <th scope="row">{{ $result->user->name }}</th>
                            <td>{{ $result->point }}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->wrong}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
         </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
