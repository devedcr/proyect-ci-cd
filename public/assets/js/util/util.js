
export function getParentElement(element, tagName) {
    while (true) {
        if (element.tagName == tagName)
            return element;
        if (element.tagName == "BODY")
            return element;
        element = element.parentNode;
    }
}