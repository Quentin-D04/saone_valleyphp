(function () {
    'use strict';
  
    class Menu {
      constructor(settings) {
        this.menuRootNode = settings.menuRootNode;
        this.isOpened = false;
      }
  
      changeMenuState() {
        this.isOpened = !this.isOpened;
        return this.isOpened;
      }
    }
  
    class MenuBurger extends Menu {
      constructor(settings) {
        super(settings);
        this.openText = settings.openText;
        this.closeText = settings.closeText;
        this.menuClassesNames = settings.menuClassesNames;
        this.menuLinks = this.menuRootNode.querySelectorAll(`.${this.menuClassesNames.menuItemClass}`);
        this.hiddenElementsQuery = settings.hiddenElementsQuery;
        this.pageNodes = document.querySelectorAll(this.hiddenElementsQuery);
        this.toggleNode = this.menuRootNode.querySelector(`.${this.menuClassesNames.toggleClass}`);
        this.a11yAttributes = ['aria-hidden', 'inert'];
        this.a11yAttributeValues = { 'aria-hidden': true, inert: '' };
      }
  
      init() {
        const currentMenuState = this.changeMenuState();
  
        this.changeToggleHint(
          this.getCurrentToggleHint(currentMenuState),
          this.menuRootNode.querySelector(`.${this.menuClassesNames.toggleHintClass}`)
        );
        this.menuRootNode.classList.toggle(`${this.menuClassesNames.activeClass}`);
        this.setCurrentA11yAttribute(currentMenuState, this.toggleNode, 'aria-expanded');
        this.getFocusCurrentNode(currentMenuState, this.toggleNode, this.menuLinks[0]);
  
        this.pageNodes.forEach((node) =>
          this.setCurrentPageA11yAttributes(currentMenuState, node, this.a11yAttributes, this.a11yAttributeValues)
        );
      }
  
      changeToggleHint(toggleHint, toggleNode) {
        if (toggleNode) toggleNode.textContent = toggleHint;
      }
  
      getCurrentToggleHint(currentMenuState) {
        return currentMenuState ? this.closeText : this.openText;
      }
  
      setCurrentA11yAttribute(currentMenuState, toggleNode, attribute) {
        if (toggleNode) {
          if (currentMenuState) {
            toggleNode.setAttribute(attribute, 'true');
          } else {
            toggleNode.removeAttribute(attribute);
          }
        }
      }
  
      getFocusCurrentNode(currentMenuState, importantFocusNode, toggleNode) {
        if (currentMenuState) {
          toggleNode?.focus();
        } else {
          importantFocusNode?.focus();
        }
      }
  
      setCurrentPageA11yAttributes(currentMenuState, node, a11yAttributes, a11yAttributeValues) {
        a11yAttributes.forEach((attribute) => {
          if (currentMenuState) {
            node.setAttribute(attribute, a11yAttributeValues[attribute]);
          } else {
            node.removeAttribute(attribute);
          }
        });
      }
    }
  
    document.addEventListener('DOMContentLoaded', function () {
      const menuClassesNames = {
        rootClass: 'js-cdpn-mobile-menu',
        activeClass: 'js-cdpn-mobile-menu_activated',
        toggleClass: 'js-cdpn-mobile-menu__toggle',
        toggleHintClass: 'js-cdpn-mobile-menu__toggle-hint',
        menuItemClass: 'js-cdpn-mobile-menu__link',
      };
  
      const jsMenuNode = document.querySelector(`.${menuClassesNames.rootClass}`);
      if (!jsMenuNode) {
        console.error('Menu non trouvé dans le DOM.');
        return;
      }
  
      const demoMenu = new MenuBurger({
        menuRootNode: jsMenuNode,
        menuClassesNames: menuClassesNames,
        openText: 'Open the menu',
        closeText: 'Close the menu',
        hiddenElementsQuery: `body > *:not(.${menuClassesNames.rootClass}):not(script)`,
      });
  
      let menuIsDisplayed = false;
  
      function toggleMenu() {
        menuIsDisplayed = !menuIsDisplayed;
        demoMenu.init();
  
        if (menuIsDisplayed) {
          document.addEventListener('keyup', handleEscape);
          document.body.classList.add('no-scroll');
        } else {
          document.removeEventListener('keyup', handleEscape);
          document.body.classList.remove('no-scroll');
        }
      }
  
      function handleEscape(event) {
        if (event.key === 'Escape' && menuIsDisplayed) {
          menuIsDisplayed = false;
          demoMenu.init();
          document.removeEventListener('keyup', handleEscape);
          document.body.classList.remove('no-scroll');
        }
      }
  
      jsMenuNode.querySelector(`.${menuClassesNames.toggleClass}`)?.addEventListener('click', toggleMenu);
    });
  })();
  