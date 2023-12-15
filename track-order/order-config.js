

export const ORDER_STATUS = {
    "pending-payment": "pending-payment",
    "on-queue": "on-queue",
    "preparing-food": "preparing-food",
    "on-delivery-rider": "on-delivery-rider",
    "ready-for-pick-up": "ready-for-pick-up",
    "waiting-for-feedback": "waiting-for-feedback",
    "gcash-proof-on-review": "gcash-proof-on-review",
    "delivered": "delivered",
};

export const STATUS_COLOR = {
    [ORDER_STATUS["pending-payment"]]: "#991b1b",
    [ORDER_STATUS["on-queue"]]: "#2b660e",
    [ORDER_STATUS["preparing-food"]]: "#1b4009",
    [ORDER_STATUS["on-delivery-rider"]]: "#c9820d",
    [ORDER_STATUS["ready-for-pick-up"]]: "#c9820d",
    [ORDER_STATUS["waiting-for-feedback"]]: "#075985",
    [ORDER_STATUS["delivered"]]: "#3f482d",
    [ORDER_STATUS["gcash-proof-on-review"]]: "#452d1b",
};