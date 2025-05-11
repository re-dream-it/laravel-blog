import './bootstrap';
import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css'; 
import '@toast-ui/editor/dist/toastui-editor-viewer.css';

const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '500px',
  initialEditType: 'markdown',
  previewStyle: 'vertical',
  toolbarItems: [
          ['heading', 'bold', 'italic'],
          ['hr'],
          ['ul', 'ol', 'indent', 'outdent'],
          ['image', 'link'],
          ['code', 'codeblock'],
  ]
});

editor.getMarkdown();

document.querySelector('form').addEventListener('submit', function(e) {
    document.querySelector('#hiddenContent').value = editor.getMarkdown();
});

