<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Buat Post Baru</h3>
            </div>
            <div class="modal-body">
                <form action="/forum/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{$errors->has('judul') ? 'has-error' : ''}}">
                        <label for="exampleInputEmail1">Judul Topik</label>
                        <input required name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apa topikmu?">
                        @if($errors->has('judul'))
                            <span class="help-block"> {{$errors->first('judul')}} </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konten</label>
                        <textarea required name="konten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3" placeholder="Tulis apa yang kamu pikirkan"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
    </div>