function formatDate(date) {
    if (!date) return "N/A";

    const options = { year: "numeric", month: "long", day: "numeric" };
    return new Date(date).toLocaleDateString("en-US", options);
}

export { formatDate };
