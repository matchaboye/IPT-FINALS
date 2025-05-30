/**
 * @copyright  (C) 2018 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
((Awesomplete, Joomla, window, document) => {

  if (!Joomla) {
    throw new Error('core.js was not properly initialised');
  }

  // Handle the autocomplete
  const onInputChange = ({
    target
  }) => {
    if (target.value.length > 1) {
      target.awesomplete.list = [];
      Joomla.request({
        url: `${Joomla.getOptions('finder-search').url}&q=${target.value}`,
        promise: true
      }).then(xhr => {
        let response;
        try {
          response = JSON.parse(xhr.responseText);
        } catch (e) {
          // Something went wrong, but we are not going to bother the enduser with this
          // eslint-disable-next-line no-console
          console.error(e);
          return;
        }
        if (Object.prototype.toString.call(response.suggestions) === '[object Array]') {
          target.awesomplete.list = response.suggestions;
        }
      }).catch(xhr => {
        // Something went wrong, but we are not going to bother the enduser with this
        // eslint-disable-next-line no-console
        console.error(xhr);
      });
    }
  };

  // Handle the submit
  const onSubmit = event => {
    event.stopPropagation();
    const advanced = event.target.querySelector('.js-finder-advanced');

    // Disable select boxes with no value selected.
    if (advanced) {
      const fields = [].slice.call(advanced.querySelectorAll('select'));
      fields.forEach(field => {
        if (!field.value) {
          field.setAttribute('disabled', 'disabled');
        }
      });
    }
  };

  // Submits the form programmatically
  const submitForm = event => {
    const form = event.target.closest('form');
    if (form) {
      form.submit();
    }
  };

  // The boot sequence
  const onBoot = () => {
    document.querySelectorAll('.js-finder-search-query').forEach(searchword => {
      // Handle the auto suggestion
      if (Joomla.getOptions('finder-search')) {
        searchword.awesomplete = new Awesomplete(searchword, {
          listLabel: Joomla.Text._('COM_FINDER_SEARCH_FORM_LIST_LABEL')
        });

        // If the current value is empty, set the previous value.
        searchword.addEventListener('input', onInputChange);
        const advanced = searchword.closest('form').querySelector('.js-finder-advanced');

        // Do not submit the form on suggestion selection, in case of advanced form.
        if (!advanced) {
          searchword.addEventListener('awesomplete-selectcomplete', submitForm);
        }
      }
    });
    document.querySelectorAll('.js-finder-searchform').forEach(form => form.addEventListener('submit', onSubmit));

    // Cleanup
    document.removeEventListener('DOMContentLoaded', onBoot);
  };
  document.addEventListener('DOMContentLoaded', onBoot);
})(window.Awesomplete, window.Joomla, window, document);
