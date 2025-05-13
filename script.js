document.getElementById('annotateBtn').addEventListener('click', function () {
  const textArea = document.getElementById('textInput');
  const selectedText = textArea.value.substring(textArea.selectionStart, textArea.selectionEnd).trim();

  if (selectedText) {
    const annotation = prompt(`Add an annotation for: "${selectedText}"`);
    if (annotation) {
      // Send to PHP
      fetch('annotation.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `user_input=${encodeURIComponent(selectedText)}&annotation=${encodeURIComponent(annotation)}`
      })
      .then(response => response.text())
      .then(data => {
        alert(data); // e.g. "Annotation saved successfully!"
        const listItem = document.createElement('li');
        listItem.textContent = `"${selectedText}" - ${annotation}`;
        document.getElementById('annotationList').appendChild(listItem);
      })
      .catch(error => {
        alert('Error saving annotation: ' + error);
      });
    }
  } else {
    alert('Please select some text in the textarea to annotate.');
  }
});

