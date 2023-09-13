export function formatDate(date, hasHours = false) {
    const months = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    let formattedDate = `${month} ${day}, ${year}`;
    if (hasHours) formatDate += ` ${hours}:${minutes.toString().padStart(2, '0')}`;
    return formattedDate;
}
