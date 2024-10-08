/**
 * To initialize the Editor, create a new instance with configuration object
 * @see docs/installation.md for mode details
 */
var editor = new EditorJS({
  /**
   * Enable/Disable the read only mode
   */
  readOnly: false,

  /**
   * Wrapper of Editor
   */
  holder: 'editorjs',

  /**
   * Common Inline Toolbar settings
   * - if true (or not specified), the order from 'tool' property will be used
   * - if an array of tool names, this order will be used
   */
  // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
  // inlineToolbar: true,

  /**
   * Tools list
   */
  tools: {
    /**
     * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
     */
    header: {
      class: Header,
      inlineToolbar: ['marker', 'link'],
      config: {
        placeholder: 'Header'
      },
      shortcut: 'CMD+SHIFT+H'
    },

    /**
     * Or pass class directly without any configuration
     */
    image: SimpleImage,

    list: {
      class: List,
      inlineToolbar: true,
      shortcut: 'CMD+SHIFT+L'
    },

    checklist: {
      class: Checklist,
      inlineToolbar: true,
    },

    quote: {
      class: Quote,
      inlineToolbar: true,
      config: {
        quotePlaceholder: 'Enter a quote',
        captionPlaceholder: 'Quote\'s author',
      },
      shortcut: 'CMD+SHIFT+O'
    },

    warning: Warning,

    marker: {
      class: Marker,
      shortcut: 'CMD+SHIFT+M'
    },

    code: {
      class: CodeTool,
      shortcut: 'CMD+SHIFT+C'
    },

    delimiter: Delimiter,

    inlineCode: {
      class: InlineCode,
      shortcut: 'CMD+SHIFT+C'
    },

    linkTool: LinkTool,

    embed: Embed,

    table: {
      class: Table,
      inlineToolbar: true,
      shortcut: 'CMD+ALT+T'
    },

  },
  data: JSON.parse(dataLoaded),
  onReady: function () {
    //saveButton.click();
  },
  onChange: function (api, event) {
    console.log('something changed', event);
  }
});

/**
 * Saving/Reseting button
 */
const saveButton = document.getElementById('saveButton');
const resetButton = document.getElementById('resetButton');

/**
 * Toggle read-only button
 */
const toggleReadOnlyButton = document.getElementById('toggleReadOnlyButton');
const readOnlyIndicator = document.getElementById('readonly-state');

/**
 * Saving as Draft
 */
saveButton.addEventListener('click', function () {
  const date = new Date().toLocaleString();
  editor.save()
    .then((savedData) => {
      console.log(savedData);
      $.ajax({
        type: "POST",
        url: 'data.php',
        data: {data : JSON.stringify(savedData['blocks'])},
        success: function (data) {
          $('.message').html('(Save In: ' + date + ')');
          $('.message').css('color', 'green');
        },
        error: function (error) {
          $('.message').html('(Error in Auto Save...)');
          $('.message').css('color', 'red');
        }
      });
    })
    .catch((error) => {
      $('.message').html('(Error in Auto Save...)');
      $('.message').css('color', 'red');
    });
});

/**
 * Saving as...
 */
saveAsButton.addEventListener('click', function () {
   var fileName = prompt('Enter the file name (without extension):', '');
   if (fileName) {
       var fullFileName = fileName + '.json';
        editor.save()
            .then((savedData) => {
                console.log(savedData);
                $.ajax({
                    type: "POST",
                    url: 'data.php',
                    data: {data : JSON.stringify(savedData['blocks']), filename: fullFileName},
                    success: function (data) {
                        alert('File saved successfully!');
                    },
                    error: function (error) {
                        alert('Error saving file...');
                    }
                });
            })
            .catch((error) => {
              alert('Error saving file...');
            });
   }
});

/**
 * Reseting Json File (default.json)
 */
resetButton.addEventListener('click', function () {
  if (confirm('Are you sure you want to delete this draft?')) {
    $.ajax({
      type: "POST",
      url: 'data.php',
      data: {reset : true},
      success: function (data) {
        window.location.reload();
      },
      error: function (error) {
        alert('Error deleting draft!');
      }
    });
  }
});

/**
 * Reseting Temporary Json File (inside all files /temp/ folder)
 */
resetTempButton.addEventListener('click', function () {
  if (confirm('Are you sure you want to delete all draft history?')) {
    $.ajax({
      type: "POST",
      url: 'data.php',
      data: {resetTemp : true},
      success: function (data) {
        window.location.reload();
      },
      error: function (error) {
        alert('Error deleting entire draft history!');
      }
    });
  }
});

/* INTERVAL TO SAVE DRAFT */

setInterval(function(){
  saveButton.click();
}, autoSaveSeconds);