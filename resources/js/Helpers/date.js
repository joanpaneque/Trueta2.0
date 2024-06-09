export function parseDate(datetime) {
    let [date, time] = datetime.split('T');
    let dateSplit = date.split('-');
    date = `${dateSplit[2]}/${dateSplit[1]}/${dateSplit[0]}`;
    time = time.split('.')[0];
    let newTime = time.split(":");
    newTime[0] = (parseInt(newTime[0])+2) % 24;
    time = newTime.join(':');
    return `${date} ${time}`;
}