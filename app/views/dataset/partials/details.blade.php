<ul class="list-group">
    <li class="list-group-item">
        <h5 class="list-group-item-heading">Formats</h5>
        <div class="btn-group formats">
            <?php $i = 0; ?>
            @foreach($formats as $format => $extension)
                @if ($extension == 'csv')
                    <a href="{{ $dataset_link }}.{{ $extension }}?limit=-1" class="btn">
                @else
                    <a href="{{ $dataset_link }}.{{ $extension }}{{ $query_string }}" class="btn">
                @endif
                @if($i == 0)
                    @if($extension == 'map')
                        <i class='fa fa-expand'></i>
                    @else
                        <i class='fa fa-file-text-o'></i>
                    @endif
                @endif
                {{ $format }}
                </a>
                <?php $i++; ?>
            @endforeach
        </div>
    </li>
    @if(!empty($source_definition['description']))
        <li class="list-group-item">
            <h5 class="list-group-item-heading">Description</h5>
            <p class="list-group-item-text">
                {{ $source_definition['description'] }}
            </p>
        </li>
    @endif
    <li class="list-group-item">
        <h5 class="list-group-item-heading">Source Type</h5>
        <p class="list-group-item-text">
            {{ strtoupper($source_definition['type']) }}
        </p>
    </li>
    @if(!empty($definition['rights']))
        <li class="list-group-item">
            <h5 class="list-group-item-heading">License</h5>
            <p class="list-group-item-text">
            @if (!empty($definition['rights_uri']) && filter_var($definition['rights_uri'], FILTER_VALIDATE_URL))
                <a href="{{ $definition['rights_uri'] }}">{{ $definition['rights'] }}</a>
            @else
                {{ $definition['rights'] }}
            @endif
            </p>
        </li>
    @endif
    @if(!empty($definition['contact_point']))
        <li class="list-group-item">
            <h5 class="list-group-item-heading">Contact</h5>
            <p class="list-group-item-text">
            @if(filter_var($definition['contact_point'], FILTER_VALIDATE_URL))
                <a href="{{ $definition['contact_point'] }}">{{ $definition['contact_point'] }}</a>
            @else
                {{ $definition['contact_point'] }}
            @endif
            </p>
        </li>
    @endif
    @if(!empty($definition['publisher_name']))
        <li class="list-group-item">
            <h5 class="list-group-item-heading">Publisher</h5>
            <p class="list-group-item-text">
                @if(!empty($definition['publisher_uri']) && filter_var($definition['publisher_uri'], FILTER_VALIDATE_URL))
                    <a href="{{ $definition['publisher_uri'] }}">{{ $definition['publisher_name'] }}</a>
                @else
                    {{ $definition['publisher_name'] }}
                @endif
            </p>
        </li>
    @endif
    @if(!empty($definition['keywords']))
        <li class="list-group-item">
            <h5 class="list-group-item-heading">Keywords</h5>
            <p class="list-group-item-text">
                {{ $definition['keywords'] }}
            </p>
        </li>
    @endif
</ul>