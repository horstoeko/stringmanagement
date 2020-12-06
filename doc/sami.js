
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:horstoeko" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="horstoeko.html">horstoeko</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:horstoeko_stringmanagement" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="horstoeko/stringmanagement.html">stringmanagement</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:horstoeko_stringmanagement_FileUtils" class="opened">                    <div style="padding-left:44px" class="hd leaf">                        <a href="horstoeko/stringmanagement/FileUtils.html">FileUtils</a>                    </div>                </li>                            <li data-name="class:horstoeko_stringmanagement_PathUtils" class="opened">                    <div style="padding-left:44px" class="hd leaf">                        <a href="horstoeko/stringmanagement/PathUtils.html">PathUtils</a>                    </div>                </li>                            <li data-name="class:horstoeko_stringmanagement_StringUtils" class="opened">                    <div style="padding-left:44px" class="hd leaf">                        <a href="horstoeko/stringmanagement/StringUtils.html">StringUtils</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "horstoeko.html", "name": "horstoeko", "doc": "Namespace horstoeko"},{"type": "Namespace", "link": "horstoeko/stringmanagement.html", "name": "horstoeko\\stringmanagement", "doc": "Namespace horstoeko\\stringmanagement"},
            
            {"type": "Class", "fromName": "horstoeko\\stringmanagement", "fromLink": "horstoeko/stringmanagement.html", "link": "horstoeko/stringmanagement/FileUtils.html", "name": "horstoeko\\stringmanagement\\FileUtils", "doc": "&quot;Class representing some string utilities for files&quot;"},
                                                        {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_fileExists", "name": "horstoeko\\stringmanagement\\FileUtils::fileExists", "doc": "&quot;Check if file $filename exists, also checks if it&#039;s readable\nTo turn off the readble check set $checkreadable to false&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_fileToBase64", "name": "horstoeko\\stringmanagement\\FileUtils::fileToBase64", "doc": "&quot;Converts a file $filename to base64 string. If the file does not exist\nthis function returns false&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_fileToBase64File", "name": "horstoeko\\stringmanagement\\FileUtils::fileToBase64File", "doc": "&quot;Converts the content of a file to BASE64 encoded file&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_base64ToFile", "name": "horstoeko\\stringmanagement\\FileUtils::base64ToFile", "doc": "&quot;Decodes a base64 string and saves it to file&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_base64FileToFile", "name": "horstoeko\\stringmanagement\\FileUtils::base64FileToFile", "doc": "&quot;Decodes a file which is containing base64 data to another file&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_combineFilenameWithFileextension", "name": "horstoeko\\stringmanagement\\FileUtils::combineFilenameWithFileextension", "doc": "&quot;Combine a filename (which has no extension) with a fileextension&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_getFileDirectory", "name": "horstoeko\\stringmanagement\\FileUtils::getFileDirectory", "doc": "&quot;Returns the directory where $filename is located&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_getFilenameWithExtension", "name": "horstoeko\\stringmanagement\\FileUtils::getFilenameWithExtension", "doc": "&quot;Returns the filename only including it&#039;s extension&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_getFilenameWithoutExtension", "name": "horstoeko\\stringmanagement\\FileUtils::getFilenameWithoutExtension", "doc": "&quot;Returns the filename only without it&#039;s extension&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_getFileExtension", "name": "horstoeko\\stringmanagement\\FileUtils::getFileExtension", "doc": "&quot;Returns the fileextension of a $filename, Optionally you can\nadd the dot on the beginning&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\FileUtils", "fromLink": "horstoeko/stringmanagement/FileUtils.html", "link": "horstoeko/stringmanagement/FileUtils.html#method_changeFileExtension", "name": "horstoeko\\stringmanagement\\FileUtils::changeFileExtension", "doc": "&quot;Change the extension of a filename&quot;"},
            
            {"type": "Class", "fromName": "horstoeko\\stringmanagement", "fromLink": "horstoeko/stringmanagement.html", "link": "horstoeko/stringmanagement/PathUtils.html", "name": "horstoeko\\stringmanagement\\PathUtils", "doc": "&quot;Class representing some string utilities for directories\/paths&quot;"},
                                                        {"type": "Method", "fromName": "horstoeko\\stringmanagement\\PathUtils", "fromLink": "horstoeko/stringmanagement/PathUtils.html", "link": "horstoeko/stringmanagement/PathUtils.html#method_combinePathWithFile", "name": "horstoeko\\stringmanagement\\PathUtils::combinePathWithFile", "doc": "&quot;Combine a path and a filename savely&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\PathUtils", "fromLink": "horstoeko/stringmanagement/PathUtils.html", "link": "horstoeko/stringmanagement/PathUtils.html#method_combinePathWithPath", "name": "horstoeko\\stringmanagement\\PathUtils::combinePathWithPath", "doc": "&quot;Combine two paths savely&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\PathUtils", "fromLink": "horstoeko/stringmanagement/PathUtils.html", "link": "horstoeko/stringmanagement/PathUtils.html#method_combineAllPaths", "name": "horstoeko\\stringmanagement\\PathUtils::combineAllPaths", "doc": "&quot;Combine multiple paths&quot;"},
            
            {"type": "Class", "fromName": "horstoeko\\stringmanagement", "fromLink": "horstoeko/stringmanagement.html", "link": "horstoeko/stringmanagement/StringUtils.html", "name": "horstoeko\\stringmanagement\\StringUtils", "doc": "&quot;Class representing some string utilities&quot;"},
                                                        {"type": "Method", "fromName": "horstoeko\\stringmanagement\\StringUtils", "fromLink": "horstoeko/stringmanagement/StringUtils.html", "link": "horstoeko/stringmanagement/StringUtils.html#method_stringIsNullOrEmpty", "name": "horstoeko\\stringmanagement\\StringUtils::stringIsNullOrEmpty", "doc": "&quot;Its like the almost known C#-Methods\nTests is string is not nul and has a value != \&quot;\&quot;&quot;"},
                    {"type": "Method", "fromName": "horstoeko\\stringmanagement\\StringUtils", "fromLink": "horstoeko/stringmanagement/StringUtils.html", "link": "horstoeko/stringmanagement/StringUtils.html#method_strisstartingwith", "name": "horstoeko\\stringmanagement\\StringUtils::strisstartingwith", "doc": "&quot;Tests if an string $astring is starting with $astartswith\nThe parameter $acaseinsensitive controls wether the comparission is\ncase sensitive or not&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


