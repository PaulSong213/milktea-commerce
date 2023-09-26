

export const ORDER_STATUS = {
    "pending-payment": "pending-payment",
    "on-queue": "on-queue",
    "preparing-food": "preparing-food",
    "on-delivery-rider": "on-delivery-rider",
    "waiting-for-feedback": "waiting-for-feedback",
    "delivered": "delivered",
};

export const STATUS_COLOR = {
    [ORDER_STATUS["pending-payment"]]: "#991b1b",
    [ORDER_STATUS["on-queue"]]: "#b51f3e",
    [ORDER_STATUS["preparing-food"]]: "#1b4009",
    [ORDER_STATUS["on-delivery-rider"]]: "#c9820d",
    [ORDER_STATUS["waiting-for-feedback"]]: "#075985",
    [ORDER_STATUS["delivered"]]: "#3f482d",
};