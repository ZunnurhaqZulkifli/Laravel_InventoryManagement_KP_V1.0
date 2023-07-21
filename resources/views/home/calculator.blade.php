<body>
    <div id="main-wrapper">
        <h1>Laravel Calculator</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (strlen(session('sum')) > 0)
            <div class="alert alert-success">
                {{ session('val1') }}  {{ session('sign') }}  {{ session('val2') }} = {{ session('sum') }}
            </div>
        @endif
        <form method="get" action="{{ route('calculator.process') }}">
            {!! csrf_field() !!}            
            <span>Value 1:</span>
            <input type="text" name="val1" size="10" value="{{ old('val1', session('val1')) }}" />
            <span>Operator:</span>
            <select name="operator">
                <option value="">Please select...</option>
                <option value="add" {{ ( old('operator', session('operator')) == 'add') ? 'selected' : '' }}>Add</option>
                <option value="multiply" {{ ( old('operator', session('operator')) == 'multiply') ? 'selected' : '' }}>Multiply</option>
                <option value="subtract" {{ ( old('operator', session('operator')) == 'subtract') ? 'selected' : '' }}>Subtract</option>
                <option value="divide" {{ ( old('operator', session('operator')) == 'divide') ? 'selected' : '' }}>Divide</option>
            </select>          
            <span>Value 2:</span>
            <input type="text" name="val2" size="10" value="{{ old('val2', session('val2')) }}" />       
            <input type="submit" name="go" value="Calculate" />  
        </form>
    </div>
    </body>