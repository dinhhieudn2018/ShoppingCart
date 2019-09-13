@forelse($configurations as $key => $value)
    <tr>
        <td>
            <input class="form-control" name='configuration[key][]' type='text' value="{{ $key }}"/>
        </td>
        <td><input class="form-control" name='configuration[value][]' type='text' value="{{ $value }}"/></td>
    </tr>
    <br>
@empty
@endforelse








