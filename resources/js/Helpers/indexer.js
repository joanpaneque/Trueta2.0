export const pages = {
    0: ['Surgeries/Index', 'Surgeries/Create'],
    1: ['Surgeries/SurgeryTypes/Index', 'Surgeries/SurgeryTypes/Create'],
    2: ['Surgeries/SurgeryTypes/HealthFlags/Index', 'Surgeries/SurgeryTypes/HealthFlags/Create', 'Surgeries/SurgeryTypes/HealthFlags/Edit'],
    3: ['Surgeries/SurgeryTypes/HealthFlags/Results/Index']
}

const parsedRoutes = {
    'Surgeries/Index': 'dashboard',
    'Surgeries/Create': 'surgeries.create',
    'Surgeries/SurgeryTypes/Index': 'surgeries.types.index',
    'Surgeries/SurgeryTypes/Create': 'surgeries.types.create',
    'Surgeries/SurgeryTypes/HealthFlags/Index': 'surgeries.types.flags.index',
    'Surgeries/SurgeryTypes/HealthFlags/Create': 'surgeries.types.flags.create',
    'Surgeries/SurgeryTypes/HealthFlags/Edit': 'surgeries.types.flags.edit',
    'Surgeries/SurgeryTypes/HealthFlags/Results/Index': 'surgeries.types.flags.results.index'
}

export function indexRoutePage(page) {
    if (page.includes('Index')) {
        return getRoute(page);
    }
    const parts = page.split('/');
    parts[parts.length - 1] = 'Index';
    return getRoute(parts.join('/'));
}

export function isIndex(page) {
    return page.includes('Index');
}

export function indexPage(page) {
    for (const [key, value] of Object.entries(pages)) {
        if (value.includes(page)) {
            return parseInt(key);
        }
    }
    return -1;
}

export function getRoute(page) {
    return parsedRoutes[page];
}

export function createRoute(page) {
    return getRoute(page.replace('Index', 'Create'));
}

export function requiredParams(props) {
    return [props?.surgeryId, props?.surgeryTypeId].filter((param) => param !== undefined);
}