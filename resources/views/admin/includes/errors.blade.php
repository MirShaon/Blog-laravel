 @if(count($errors)>0)
            <ul  class="list-group">
                  @foreach($errors->all() as $error)
                    <li style="background:rgb(12,34,45);color: white;" class="list-group-item text-danger">
                          {{ $error }}
                    </li>
                  @endforeach
            </ul>

      @endif